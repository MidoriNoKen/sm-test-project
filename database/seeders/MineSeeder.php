<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mine;
use App\Models\Office;

class MineSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan semua kantor
        $offices = Office::all();

        // Data tambang untuk setiap kantor
        $minesData = [
            [
                'name' => 'Tambang 1',
                'address' => 'Alamat Tambang 1',
                'telephone' => 'Telepon Tambang 1',
            ],
            [
                'name' => 'Tambang 2',
                'address' => 'Alamat Tambang 2',
                'telephone' => 'Telepon Tambang 2',
            ],
            [
                'name' => 'Tambang 3',
                'address' => 'Alamat Tambang 3',
                'telephone' => 'Telepon Tambang 3',
            ],
        ];

        // Loop melalui setiap kantor dan tambahkan 3 tambang ke setiap kantor
        foreach ($offices as $office) {
            foreach ($minesData as $mineData) {
                $mineData['office_id'] = $office->id;
                Mine::create($mineData);
            }
        }
    }
}
