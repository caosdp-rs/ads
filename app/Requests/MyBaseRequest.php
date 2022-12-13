<?php

namespace App\Requests;

class MyBaseRequest
{
    protected $validation;
    protected $request;
    protected $response;

    public function __construct()
    {
        $this->validation = service('validation');
        $this->request = service('request');
        $this->response = service('response');
    }

    protected function validate(string $ruleGroup, bool $responseWithRedirect = false )
    {
        $this->validation->setRuleGroup($ruleGroup);
        if(!$this->validation->withRequest($this->request)->run()){
            // Formulário não foi validado
            if($responseWithRedirect){
                $this->responseWithRedirect();
            }
            $this->respondWithValidationErrors();

        }
    }

    private function responseWithRedirect()
    {
        redirect()->back->with('danger', lang('App.danger_validations'))
            ->with('errors_model',$this->validation->getErrors())
            ->withInput()
            ->send();
        exit;
    }
    private function respondWithValidationErrors() : array
    {
        $response = [
            'success'=>false,
            'token'=> csrf_hash(),
            'errors' => $this->validation->getErrors()
        ];

        if(url_is('api*')){
            unset($response['token']);
        }

        $this->response->setJSON($response)->send();
        exit;
    }

    public function respondWithMessage(bool $success = true, string $message = '', int $statusCode=200) : array
    {
        $response = [
            'code' => $statusCode,
            'success'=>$success,
            'token'=> csrf_hash(),
            'message' => $message
        ];
        if(url_is('api*')){
            unset($response['token']);
        }
        return $response;

    }
}