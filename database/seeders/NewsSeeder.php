<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(10)->create();

        $sources = Source::factory(10)->create();

        $i = 0;
        while ($i <= 100)
        {
            $news = News::factory()
                ->for($categories->random())
                ->for($sources->random())
                ->create();
            $i++;
        }
    }
}
