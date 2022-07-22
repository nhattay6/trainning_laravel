<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\Category;

class CategoriesTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::truncate();
        Category::truncate();

        factory(Category::class, 5)->create()->each(function($func) {
            $funcc->topics()->saveMany(
                factory(Topic::class, 5)->create([
                    'category_id' => $funcc->id
                ])
            );
        });
    }
}
