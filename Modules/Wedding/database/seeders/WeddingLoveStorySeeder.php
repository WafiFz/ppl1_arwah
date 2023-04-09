<?php

namespace Modules\Wedding\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Wedding\Entities\WeddingLoveStory;
use Modules\Wedding\Entities\Wedding;

class WeddingLoveStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * wedding_love_stories Seed
         * ------------------
         */

        // DB::table('wedding_love_stories')->truncate();
        // echo "Truncate: wedding_love_stories \n";

        $weddings = Wedding::all();
        $years = ['2018', '2019', '2020', '2021', '2022'];
        foreach ($weddings as $wedding) {
            foreach($years as $year){
                WeddingLoveStory::factory()->create([
                    'wedding_id' => $wedding->id,
                    'year' => $year,
                ]);
            }
        }
        $rows = WeddingLoveStory::all();
        echo " Insert: wedding_love_stories \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
