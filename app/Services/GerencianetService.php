<?php

namespace App\Services;

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

use App\Entities\Plan;
use Exception;

class GerenciaNetService
{

    public const PAYMENT_METHOD_BILLET = 'billet';
    public const PAYMENT_METHOD_CREDIT = 'credit';

    private const STATUS_NEW         = 'new';
    private const STATUS_WAITING     = 'waiting';
    private const STATUS_PAID        = 'paid';
    private const STATUS_UNPAID      = 'unpaid';
    private const STATUS_REFUNDED    = 'refunded';
    private const STATUS_CONTESTED   = 'contested';
    private const STATUS_SETTLED     = 'settled';
    private const STATUS_CANCELED    = 'canceled';

    private $options;
    private $user;
    private $subscriptionService;
    private $userSubscription;

    public function __construct()
    {
        $this->options = [
            'client_id'     => env('GERENCIANET_CLIENT_ID'),
            'client_secret' => env('GERENCIANET_CLIENT_SECRET'),
            'sandbox'       => env('GERENCIANET_SANDBOX'),
            'time'          => env('GERENCIANET_TIMEOUT'),
        ];
    }

    public function createPlan(Plan $plan)
    {
        // Definimos a periodicidade das cobranças a serem geradas
        $plan->setIntervalRepeats();

        // echo '<pre>';
        // print_r($plan);
        // throw new Exception('teste');

        $body = [
            'name'          => $plan->name,
            'interval'      => $plan->interval,
            'repeats'       => $plan->repeats
        ];

        // $plan->plan_id = 1;
        // return;
        try {
            $api = new Gerencianet($this->options);
            //$response = $api->createPlan([], $body);
            $response = $api->createPlan($params = [], $body);

            $plan->plan_id = (int) $response['data']['plan_id'];
            //print_r("<pre>$plan->plan_id" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</pre>");
            //exit;
        } catch (GerencianetException $e) {
            // print_r($e->code);
            // print_r($e->error);
            // print_r($e->errorDescription);
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            die('Erro ao salvar plano na gerencianet');
        } catch (\Exception $e) {
            //print_r($e->getMessage());
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            die('Erro ao salvar plano na gerencianet');
        }
    }

    public function updatePlan(Plan $plan)
    {

        $params = ['id' => $plan->plan_id];

        $body = ['name' => $plan->name];

        try {
            $api = new Gerencianet($this->options);
            $response = $api->updatePlan($params, $body);

        } catch (GerencianetException $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            die('Erro ao salvar plano na gerencianet');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            die('Erro ao salvar plano na gerencianet');
        }
    }

    public function deletePlan(int $planId)
    {

        $params = ['id' => $planId];

        try {
            $api = new Gerencianet($this->options);
            $response = $api->deletePlan($params, []);
        
            //echo '<pre>' . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</pre>';
        } catch (GerencianetException $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            die('Erro ao excluir plano na gerencianet');
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            die('Erro ao excluir plano na gerencianet');
        }

    }
}
