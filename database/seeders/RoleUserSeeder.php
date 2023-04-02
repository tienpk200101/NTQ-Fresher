<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'role_id' => 2
            ],
            [
                'user_id' => 1,
                'role_id' => 3
            ],
            [
                'user_id' => 1,
                'role_id' => 4
            ],
            [
                'user_id' => 1,
                'role_id' => 5
            ],
            [
                'user_id' => 1,
                'role_id' => 6
            ],
        ];

        foreach ($data as $role_user) {
            RoleUser::create($role_user);
        }
    }
}
