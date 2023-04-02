<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'name' => 'create',
                'slug' => 'create'
            ],[
                'name' => 'store',
                'slug' => 'store'
            ],[
                'name' => 'edit',
                'slug' => 'edit'
            ],[
                'name' => 'update',
                'slug' => 'update'
            ],[
                'name' => 'delete',
                'slug' => 'delete'
            ]
        ];
        foreach ($data as $role) {
            Role::create($role);
        }
    }
}
