<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Work',
            ],
            [
                'name' => 'Personal',
            ],
            [
                'name' => 'Personal',
            ],
            [
                'name' => 'Urgent',
            ],
            [
                'name' => 'Low Priority',
            ],
            [
                'name' => 'Completed',
            ],
        ];
        Category::insert($categories);
    }
}
