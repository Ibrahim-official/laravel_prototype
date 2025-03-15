<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Use factories to scaffold data and prepare tests
     * Databse Seeders give us class where we can trigger those factories, or database calls
     */
    public function run(): void
    {
        Job::factory(200)->create();
    }
}
