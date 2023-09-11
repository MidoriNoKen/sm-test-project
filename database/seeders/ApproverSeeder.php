<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Approver;
use App\Models\Role;
use App\Models\Office;

class ApproverSeeder extends Seeder
{
    public function run()
    {
        $approversData = [
            [
                'name' => 'Approver Office 1',
                'email' => 'approver1@office1.com',
                'password' => bcrypt('password1'),
                'position' => 'Position 1',
                'role_id' => Role::where('role_name', 'approver')->first()->id,
                'office_id' => Office::where('name', 'Office 1')->first()->id,
            ],
            [
                'name' => 'Approver Office 2',
                'email' => 'approver2@office2.com',
                'password' => bcrypt('password2'),
                'position' => 'Position 2',
                'role_id' => Role::where('role_name', 'approver')->first()->id,
                'office_id' => Office::where('name', 'Office 2')->first()->id,
            ],
        ];

        foreach ($approversData as $approverData) {
            Approver::create($approverData);
        }
    }
}
