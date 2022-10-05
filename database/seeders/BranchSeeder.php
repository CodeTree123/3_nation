<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\branch;


class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        branch::create([
            'branch_name' => 'Men',
            'branch_status' => '1',
        ]);
        branch::create([
            'branch_name' => 'Women',
            'branch_status' => '1',
        ]);
        branch::create([
            'branch_name' => 'Kids',
            'branch_status' => '1',
        ]);
    }
}
