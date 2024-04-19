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
        collect([
            ['name' => 'Draught', 'slug' => 'draught'],
            ['name' => 'Bottled', 'slug' => 'bottled'],
            ['name' => 'Soft Drinks', 'slug' => 'soft_drinks'],
            ['name' => 'Hot Drinks', 'slug' => 'hot_drinks'],
            ['name' => 'Snacks', 'slug' => 'snacks'],
        ])->each(function($item){
            Category::Create($item);
        });
    }
}
