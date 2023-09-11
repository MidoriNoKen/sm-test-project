<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    public function run()
    {
        // Buat 5 Driver
        $driversData = [
            // Data Driver 1
            [
                'name' => 'Driver 1',
                'email' => 'driver1@example.com',
                'phone' => '081234567891',
                'nik' => '1234567890',
                'address' => 'Alamat Driver 1',
            ],
            // Data Driver 2
            [
                'name' => 'Driver 2',
                'email' => 'driver2@example.com',
                'phone' => '081234567892',
                'nik' => '1234567891',
                'address' => 'Alamat Driver 2',
            ],
            // Data Driver 3
            [
                'name' => 'Driver 3',
                'email' => 'driver3@example.com',
                'phone' => '081234567893',
                'nik' => '1234567892',
                'address' => 'Alamat Driver 3',
            ],
            // Data Driver 4
            [
                'name' => 'Driver 4',
                'email' => 'driver4@example.com',
                'phone' => '081234567894',
                'nik' => '1234567893',
                'address' => 'Alamat Driver 4',
            ],
            // Data Driver 5
            [
                'name' => 'Driver 5',
                'email' => 'driver5@example.com',
                'phone' => '081234567895',
                'nik' => '1234567894',
                'address' => 'Alamat Driver 5',
            ],
        ];

        foreach ($driversData as $driverData) {
            Driver::create($driverData);
        }
    }
}
