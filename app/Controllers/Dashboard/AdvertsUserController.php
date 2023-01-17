<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Services\AdvertServcice;
use App\Services\AdvertService;
use CodeIgniter\Config\Factories;

class AdvertsUserController extends BaseController
{
    private $advertService;

    public function __construct()
    {
        $this->advertService = Factories::class(AdvertService::class);
    }

    public function index()
    {
        //dd($this->advertService->getAllAdverts());
        $this->advertService->getAllAdverts();
        return view('Dashboard/Adverts/index');
    }

    public function getUserAdverts()
    {
        if (!$this->request->isAJAX()){
            return redirect()->back();
        }

        $response = [
            'data'=>$this->advertService->getAllAdverts(classBtnActions:'btn btn-sm btn-outline-primary'),
        ];
        //Quando se utiliza ajax request não dá pra visualizar com o comando DD então precisa usar <pre>
        // echo '<pre>';
        // print_r($response);
        // exit();

        return $this->response->setJSON($response);
    }
}
