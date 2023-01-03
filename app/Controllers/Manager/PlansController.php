<?php

namespace App\Controllers\Manager;

use App\Controllers\BaseController;
use App\Requests\PlanRequest;
use App\Entities\Plan;
use App\Services\PlanService;
use CodeIgniter\Config\Factories;

class PlansController extends BaseController
{
    private $planService;
    private $planRequest;
    public function __construct()
    {
        $this->planService = Factories::class(PlanService::class);
        $this->planRequest = Factories::class(PlanRequest::class);
    }
    public function index()
    {
        return view('Manager/Plans/index');
    }
    public function archived()
    {
        return view('Manager/Plans/archived');
    }
    public function getAllPlans()
    {
        if (!$this->request->isAjax()) { 
            return redirect()->back();
        }
        return $this->response->setJSON(['data' => $this->planService->getAllPlans()]);
    }
    public function getAllArchived()
    {
        if (!$this->request->isAjax()) { 
            return redirect()->back();
        }
        return $this->response->setJSON(['data' => $this->planService->getAllArchived()]);
    }
    public function getRecorrences()
    {
        if (!$this->request->isAjax()) { 
            return redirect()->back();
        }
        return $this->response->setJSON(['recorrences' => $this->planService->getRecorrences()]);
    }
    public function create(){
        $this->planRequest->validateBeforeSave('plan');
        $plan = new Plan($this->removeSpoofingFromRequest());
        $this->planService->trySavePlan($plan);
        return $this->response->setJSON($this->planRequest->respondWithMessage(message: lang('App.success_saved')));
    }
    public function getPlanInfo(){
        if (!$this->request->isAjax()) { 
            return redirect()->back();
        }
        $plan = $this->planService->getPlanByID($this->request->getGetPost('id'));
        // echo '<pre>';
        // print_r($plan);
        // exit;
        $response = [
            'plan'=>$plan,
            'recorrences'=>$this->planService->getRecorrences($plan->recorrence),
        ];
        return $this->response->setJson($response);
    }
    public function update()
    {
        $this->planRequest->validateBeforeSave('plan');
        $plan = $this->planService->getPlanByID($this->request->getGetPost('id'));
        $plan->fill($this->removeSpoofingFromRequest());
        $this->planService->trySavePlan($plan);
        return $this->response->setJSON($this->planRequest->respondWithMessage(message: lang('App.success_saved')));
    }

    
    public function archive()
    {
        $this->planService->tryArchivePlan($this->request->getGetPost('id'));
        return $this->response->setJSON($this->planRequest->respondWithMessage(message: lang('App.success_saved')));
    }



}
