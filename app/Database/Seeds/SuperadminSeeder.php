<?php

namespace App\Database\Seeds;

use App\Entities\User;
use CodeIgniter\Config\Factories;
use CodeIgniter\Database\Seeder;

class SuperadminSeeder extends Seeder
{
    public function run()
    {
        try{
            $this->db->transStart();
            $user = new User([
                'username'=>'candre',
                // 'name'=>'Carlos',
                // 'last_name'=>'Silva',
                'email'=>'manager@gmail.com',
                'password'=>'12345678',
                'email_verified_at' => date('Y-m-d H:i:s'),
            ]);

            $userID = Factories::models(UserModel::class)->insert($user);

            $this->createSuperadmin($userID);

            $this->db->transComplete();

            echo "Superadmin criado com sucesso";

        }catch(\Exception $e)
        {
            print $e->getMessage();
        }
    }

    public function createSuperadmin(int $userID)
    {
        $db = \Config\Database::connect();
        $superadmin = [
            'user_id'=>$userID
        ];
        $db->table('superadmins')->insert($superadmin);
    }
}
