<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            OfficeSeeder::class,
            AdminSeeder::class,
            MineSeeder::class,
            ApproverSeeder::class,
            DriverSeeder::class,
            CompanySeeder::class,
            VehicleSeeder::class,
            MineSeeder::class,
            FuelConsumptionSeeder::class,
            ServiceScheduleSeeder::class,
            VehicleUsageHistorySeeder::class,
        ]);
        

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
