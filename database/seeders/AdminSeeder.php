<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Office;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $adminsData = [
            [
                'name' => 'Admin Office 1',
                'email' => 'admin1@office1.com',
                'password' => bcrypt('password1'),
                'role_id' => Role::where('role_name', 'admin')->first()->id,
                'office_id' => Office::where('name', 'Office 1')->first()->id,
            ],
            [
                'name' => 'Admin Office 2',
                'email' => 'admin2@office2.com',
                'password' => bcrypt('password2'),
                'role_id' => Role::where('role_name', 'admin')->first()->id,
                'office_id' => Office::where('name', 'Office 2')->first()->id,
            ],
        ];

        foreach ($adminsData as $adminData) {
            Admin::create($adminData);
        }
    }
}
