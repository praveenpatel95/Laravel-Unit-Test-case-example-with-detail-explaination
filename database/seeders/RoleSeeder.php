<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['super_admin', 'admin', 'author', 'reviewer', 'editor'];
        foreach ($roles as $key => $role){
            Role::create(['name' => $role]);
        }
    }
}
