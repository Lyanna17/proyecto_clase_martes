<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnologia = new Category();
        $tecnologia->name = "Tecnologia";
        $tecnologia->desciption = "Todo lo relacionado a tecnologia";

        $tecnologia->save();
    }
}
