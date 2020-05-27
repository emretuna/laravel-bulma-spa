<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BadgeSeeder::class,
            ClinicSeeder::class,
            CommentSeeder::class,
            DoctorSeeder::class,
            FeatureSeeder::class,
            HotelSeeder::class,
            PageSeeder::class,
            TagSeeder::class,
            TreatmentSeeder::class,
        ]);
    }
}
