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
            'branch_name' => 'Men',//id=1
            'branch_status' => '1',
        ]);
        branch::create([
            'branch_name' => 'Women',//id=2
            'branch_status' => '1',
        ]);
        branch::create([
            'branch_name' => 'Kids',//id=3
            'branch_status' => '1',
        ]);
    }
}
