<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Office;

class OfficeSeeder extends Seeder
{
    public function run()
    {
        $offices = [
            [
                'name' => 'Office 1',
                'address' => 'Alamat Office 1',
                'telephone' => 'Telepon Office 1',
            ],
            [
                'name' => 'Office 2',
                'address' => 'Alamat Office 2',
                'telephone' => 'Telepon Office 2',
            ],
        ];

        foreach ($offices as $officeData) {
            Office::create($officeData);
        }
    }
}
