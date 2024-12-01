<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('categories')->pluck('id')->toArray();
        $priorities = ['low', 'medium', 'high'];

        for ($i = 0; $i < 50; $i++) {
            DB::table('tasks')->insert([
                'title' => 'Task ' . Str::random(5),
                'category_id' => $categories[array_rand($categories)],
                'priority' => $priorities[array_rand($priorities)],
                'due_date' => Carbon::now()->addDays(rand(1, 30)),
                'completed' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
