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
        Category::create([
            "name" => "Pemrograman",
            "slug" => "pemrograman",
            "color" => "red"
        ]);

        Category::create([
            "name" => "Pemrograman Web",
            "slug" => "pemrograman-web",
            "color" => "yellow"
        ]);

        Category::create([
            "name" => "Android Developing",
            "slug" => "android-dev",
            "color" => "blue"
        ]);
        Category::create([
            "name" => "Jaringan Komputer",
            "slug" => "jaringan-komputer",
            "color" => "green"
        ]);

        Category::create([
            "name" => "Cloud Computing",
            "slug" => "cloud-computing",
            "color" => "gray"
        ]);
    }
}
