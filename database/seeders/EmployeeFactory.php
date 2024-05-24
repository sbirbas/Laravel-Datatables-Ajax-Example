<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'address' => '123 Main St',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
