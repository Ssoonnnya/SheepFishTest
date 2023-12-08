<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Companies;
use Illuminate\Support\Str;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Companies::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'logo' => Str::random(10),
            'website' => Str::random(10).'.com',
        ]);
    }
}
