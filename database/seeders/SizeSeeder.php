<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++) {
            DB::table('sizes')->insert([
                [
                    'name' => 'Size ' . $i,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
        }
    }
}
