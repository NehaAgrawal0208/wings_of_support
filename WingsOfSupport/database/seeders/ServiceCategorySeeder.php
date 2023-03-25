<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_categories')->insert([
            [
                "name" => "AC",
                "slug" => "ac",
                "image" => "ac.png"
            ],
            [
                "name" => "Beauty",
                "slug" => "beauty",
                "image" => "beauty.png"
            ],
            [
                "name" => "Plumbing",
                "slug" => "plumbing",
                "image" => "plumbing.png"
            ],
            [
                "name" => "Electrical",
                "slug" => "electrical",
                "image" => "electrical.png"
            ],
            [
                "name" => "Shower Filter",
                "slug" => "shower_filter",
                "image" => "shower_filter.png"
            ],
            [
                "name" => "Home Cleaning",
                "slug" => "home_cleaning",
                "image" => "home_cleaning.png"
            ],
            [
                "name" => "Carpentry",
                "slug" => "carpentry",
                "image" => "carpentry.png"
            ],
            [
                "name" => "Chimney Hob",
                "slug" => "chimney_hob",
                "image" => "chimney_hob.png"
            ],
            [
                "name" => "Computer Repair",
                "slug" => "computer_repair",
                "image" => "computer_repair.png"
            ],
            [
                "name" => "Pest Control",
                "slug" => "pest_control",
                "image" => "pest_control.png"
            ],
        ]);
    }
}
