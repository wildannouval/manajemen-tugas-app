<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'id' => 1,
            'status_name' => 'Belum Selesai',
        ]);

        Status::create([
            'id' => 2,
            'status_name' => 'Selesai',
        ]);
    }
}
