<?php

namespace App\Services;

use App\Entities\Plan;
use App\Models\PlanModel;
use CodeIgniter\Config\Factories;

class PlanService
{
    private $planModel;
    public function __construct()
    {
        $this->planModel = Factories::models(PlanModel::class);
    }
    public function getAllPlans(): array
    {
        $plans = $this->planModel->findAll();
        $data = [];
        foreach ($plans as $plan) {
            $btnEdit = form_button(
                [
                    'data-id' => $plan->id,
                    'id' => 'updatePlanBtn', // id do html element
                    'class' => 'btn btn-primary btn-sm'
                ],
                lang('App.btn_edit')
            );
            $btnArchive = form_button(
                [
                    'data-id' => $plan->id,
                    'id' => 'archivePlanBtn', // ID do html element
                    'class' => 'btn btn-info btn-sm'
                ],
                lang('App.btn_archive')
            );
            $data[] = [
                'code'                  => $plan->plan_id,
                'name'                  => $plan->name,
                'is_highlighted'        => $plan->isHighlighted(), // da classe entity
                'details'               => $plan->details(), // da classe entity
                'actions'               => $btnEdit . ' ' . $btnArchive,
            ];
        }
        return $data;
    }
    public function getRecorrences(string $recorrence = null): string
    {
        $options = [];
        $selected = [];
        $options = [
            '' => lang('Plans.label_recorrence'),
            Plan::OPTION_MONTHLY => LANG('Plans.text_monthly'),
            Plan::OPTION_QUARTERLY => LANG('Plans.text_quarterly'),
            Plan::OPTION_SEMESTER => LANG('Plans.text_semester'),
            Plan::OPTION_YEARLY => LANG('Plans.text_yearly'),
        ];

        // Estou criando um plano?
        if (is_null($recorrence)) {
            return form_dropdown('recorrence', $options, $selected, ['class' => 'form-control']);
        }
        
        // Editando um plano
        $selected[] = match ($recorrence){
            Plan::OPTION_MONTHLY => Plan::OPTION_MONTHLY,
            Plan::OPTION_QUARTERLY => Plan::OPTION_QUARTERLY,
            Plan::OPTION_SEMESTER => Plan::OPTION_SEMESTER,
            Plan::OPTION_YEARLY => Plan::OPTION_YEARLY,
            default             => throw new \InvalidArgumentException("Unsupported recorrence{$recorrence}")
        };
        return form_dropdown('recorrence', $options, $selected, ['class' => 'form-control']);
    }

    public function trySavePlan(Plan $plan, bool $protect = true)
    {

        /**
         * @todo gerenciar a criação atualização na gerencia net
         */
        try {
            if ($plan->hasChanged()) {
                $this->planModel->protect($protect)->save($plan);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function getPlanByID(int $id, bool $withDeleted=false){
        $plan = $this->planModel->withDeleted($withDeleted)->find($id);
        if (is_null($plan)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Plan not found');
        }
        return $plan;
    }
}
