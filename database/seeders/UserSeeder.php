<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
           'name' => 'Super Admin',
           'email' => 'super_admin@gmail.com',
           'password' => Hash::make('123456'),
           'role_type' => 'super_admin',
        ]);
        $superAdmin->assignRole('super_admin');
    }
}
