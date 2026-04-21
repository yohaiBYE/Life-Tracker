<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Transaction;
use App\Models\JobApps;
use App\Models\HomeworkTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Transaction::factory(10)->create();
        JobApps::factory(10)->create();
        HomeworkTask::factory(10)->create();
    }
}
