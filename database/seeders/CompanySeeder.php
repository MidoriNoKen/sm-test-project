<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $companiesData = [
            [
                'name' => 'Company 1',
                'address' => 'Alamat Company 1',
                'telephone' => 'Telepon Company 1',
                'email' => 'company1@gmail.com',
            ],
            [
                'name' => 'Company 2',
                'address' => 'Alamat Company 2',
                'telephone' => 'Telepon Company 2',
                'email' => 'company2@gmail.com',
            ],
            // Tambahkan data dummy lainnya di sini sesuai kebutuhan
        ];

        foreach ($companiesData as $companyData) {
            Company::create($companyData);
        }
    }
}

