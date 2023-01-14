<?php

namespace App\Services;

use App\Entities\Plan;
use App\Models\PlanModel;
use CodeIgniter\Config\Factories;
use phpDocumentor\Reflection\PseudoTypes\True_;

class PlanService
{
    private $planModel;
    private $gerencianetService;

    public function __construct()
    {
        $this->planModel = Factories::models(PlanModel::class);
        $this->gerencianetService = Factories::class(GerenciaNetService::class);
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
    public function getAllArchived(): array
    {
        $plans = $this->planModel->onlyDeleted()->findAll();
        $data = [];
        foreach ($plans as $plan) {
            $btnRecover = form_button(
                [
                    'data-id' => $plan->id,
                    'id' => 'recoverPlanBtn', // id do html element
                    'class' => 'btn btn-primary btn-sm'
                ],
                lang('App.btn_recover')
            );
            $btnDelete = form_button(
                [
                    'data-id' => $plan->id,
                    'id' => 'deletePlanBtn', // ID do html element
                    'class' => 'btn btn-danger btn-sm'
                ],
                lang('App.btn_delete')
            );
            $data[] = [
                'code'                  => $plan->plan_id,
                'name'                  => $plan->name,
                'is_highlighted'        => $plan->isHighlighted(), // da classe entity
                'details'               => $plan->details(), // da classe entity
                'actions'               => $btnRecover . ' ' . $btnDelete,
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
        $selected[] = match ($recorrence) {
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
        $this->createOrUpdatePlanOnGerencianet($plan);
        try {
            if ($plan->hasChanged()) {
                $this->planModel->protect($protect)->save($plan);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function getPlanByID(int $id, bool $withDeleted = false)
    {
        $plan = $this->planModel->withDeleted($withDeleted)->find($id);
        if (is_null($plan)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Plan not found');
        }
        return $plan;
    }
    public function tryArchivePlan(int $id)
    {
        try {

            $plan = $this->getPlanByID($id);
            $this->planModel->delete($plan->id);
        } catch (\Exception $e) {

            die($e->getMessage());
        }
    }

    public function tryRecoverPlan(int $id)
    {
        try {

            $plan = $this->getPlanByID($id, withDeleted: true);
            $plan->recover();
            $this->planModel->protect(false)->save($plan);
        } catch (\Exception $e) {

            die($e->getMessage());
        }
    }

    public function tryDeletePlan(int $id)
    {
        try {

            $plan = $this->getPlanByID($id, withDeleted: true);

            $this->gerencianetService->deletePlan($plan->plan_id);

            $this->planModel->delete($plan->id, purge: true); //força a deleção do registro do banco de dados

        } catch (\Exception $e) {

            die($e->getMessage());
        }
    }

    private function createOrUpdatePlanOnGerencianet(Plan $plan)
    {
        // Estamos criando um plano?
        if (empty($plan->id)) {
            //Sim
            return $this->gerencianetService->createPlan($plan);
        } else {
            //Nao
            // A gerenciaNet só permite atualizar o nome do plano
            if ($plan->hasChanged('name')) {
                return $this->gerencianetService->updatePlan($plan);
            }
        }
    }
}
