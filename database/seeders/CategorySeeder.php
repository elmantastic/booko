<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'name' => 'adventure',
        ]);
        DB::table('categories')->insert([
        	'name' => 'action',
        ]);
        DB::table('categories')->insert([
        	'name' => 'biography',
        ]);
        DB::table('categories')->insert([
        	'name' => 'business',
        ]);
        DB::table('categories')->insert([
        	'name' => 'classic',
        ]);
        DB::table('categories')->insert([
        	'name' => 'comedy',
        ]);
        DB::table('categories')->insert([
        	'name' => 'comic',
        ]);
        DB::table('categories')->insert([
        	'name' => 'cookbooks',
        ]);
        DB::table('categories')->insert([
        	'name' => 'crime',
        ]);
        DB::table('categories')->insert([
        	'name' => 'fantasy',
        ]);
        DB::table('categories')->insert([
        	'name' => 'fiction',
        ]);
        DB::table('categories')->insert([
        	'name' => 'history',
        ]);
        DB::table('categories')->insert([
        	'name' => 'horror',
        ]);
        DB::table('categories')->insert([
        	'name' => 'lifestyle',
        ]);
        DB::table('categories')->insert([
        	'name' => 'mystery',
        ]);
        DB::table('categories')->insert([
        	'name' => 'non_fiction',
        ]);
        DB::table('categories')->insert([
        	'name' => 'romance',
        ]);
        DB::table('categories')->insert([
        	'name' => 'sci-fi',
        ]);
        DB::table('categories')->insert([
        	'name' => 'thrillers',
        ]);
    }
}
