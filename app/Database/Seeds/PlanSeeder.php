<?php

namespace App\Database\Seeds;

use App\Models\PlanModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Database\Exceptions\DatabaseException;


class PlanSeeder extends Seeder
{
    public function run()
    {
        try {

            $this->db->transStart();

            $planModel = Factories::models(PlanModel::class);
            foreach(self::plans() as $plan){
                $planModel->insert($plan);
            }
            $this->db->transComplete();
            echo 'Planos criados com sucesso!';
            
        } catch (\Throwable $th) {
            print $th;
        }
    }
    private static function plans():array
    {
        $plans = array(
            array(

                "plan_id" => 9994,
                "name" => "Plano Mensal",
                "recorrence" => "monthly",
                "adverts" => 10,
                "description" => "Plano Mensal Básico",
                "value" => 39.90,
                "is_highlighted" => 0,

            ),
            array(
                "plan_id" => 9995,
                "name" => "Plano Trimestral",
                "recorrence" => "quarterly",
                "adverts" => 20,
                "description" => "Plano trimestral básico",
                "value" => 99.00,
                "is_highlighted" => 0,
            ),
            array(
                "plan_id" => 9996,
                "name" => "Plano Semestral",
                "recorrence" => "semester",
                "adverts" => NULL,
                "description" => "Plano Semestral",
                "value" => 199.99,
                "is_highlighted" => 1,
            ),
            array(
                "plan_id" => 9997,
                "name" => "Plano Anual",
                "recorrence" => "yearly",
                "adverts" => NULL,
                "description" => "Plano anual",
                "value" => 369.00,
                "is_highlighted" => 1,
            ),
        );
        return $plans;
    }
}
