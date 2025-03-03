<?php

namespace Database\Seeders;

use App\Models\User;  // Use the User model instead
use Illuminate\Database\Seeder;

class CoolTechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();  // Use User model if that was the intent
    }
}

