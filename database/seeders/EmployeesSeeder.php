<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Employees;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::create([
            'firstName' => Str::random(10),
            'lastName' => Str::random(10),
            'company_id' => 1,
            'email' => Str::random(10).'@gmail.com',
            'phone' => 12345678,

        ]);
    }
}
