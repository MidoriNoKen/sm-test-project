<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Company;
use App\Models\FuelConsumption;
use App\Models\ServiceSchedule;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        // Buat 5 Vehicle
        $vehiclesData = [
            // Data Vehicle 1
            [
                'name' => 'Vehicle 1',
                'type' => 'Angkutan Orang',
                'fuel_consumption' => '10',
                'service_schedule' => 'Service Schedule 1',
                'company_id' => Company::where('name', 'Company 1')->first()->id,
                'status' => 'Tersedia',
            ],
            // Data Vehicle 2
            [
                'name' => 'Vehicle 2',
                'type' => 'Angkutan Barang',
                'fuel_consumption' => '12',
                'service_schedule' => 'Service Schedule 2',
                'company_id' => Company::where('name', 'Company 1')->first()->id,
                'status' => 'Tersedia',
            ],
            // Data Vehicle 3
            [
                'name' => 'Vehicle 3',
                'type' => 'Angkutan Orang',
                'fuel_consumption' => '9',
                'service_schedule' => 'Service Schedule 3',
                'company_id' => Company::where('name', 'Company 1')->first()->id,
                'status' => 'Tersedia',
            ],
            // Data Vehicle 4
            [
                'name' => 'Vehicle 4',
                'type' => 'Angkutan Barang',
                'fuel_consumption' => '11',
                'service_schedule' => 'Service Schedule 4',
                'company_id' => Company::where('name', 'Company 2')->first()->id,
                'status' => 'Tersedia',
            ],
            // Data Vehicle 5
            [
                'name' => 'Vehicle 5',
                'type' => 'Angkutan Orang',
                'fuel_consumption' => '10.5',
                'service_schedule' => 'Service Schedule 5',
                'company_id' => Company::where('name', 'Company 2')->first()->id,
                'status' => 'Tersedia',
            ],
        ];

        foreach ($vehiclesData as $vehicleData) {
            // Membuat Vehicle
            $vehicle = Vehicle::create($vehicleData);

            // Membuat FuelConsumption
            FuelConsumption::create([
                'vehicle_id' => $vehicle->id,
                'fuel_consumed' => 0,
                'fuel_amount' => 0,
                'date' => now(),
                'notes' => null,
            ]);

            // Membuat ServiceSchedule
            ServiceSchedule::create([
                'vehicle_id' => $vehicle->id,
                'schedule_date' => now(), // Menggunakan 'schedule_date' sesuai dengan perubahan pada skema
                'notes' => null,
            ]);
        }
    }
}
