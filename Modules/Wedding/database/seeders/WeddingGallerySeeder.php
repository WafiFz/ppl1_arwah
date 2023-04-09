<?php

namespace Modules\Wedding\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Wedding\Entities\WeddingGallery;
use Modules\Wedding\Entities\Wedding;

class WeddingGallerySeeder extends Seeder
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
         * wedding_galleries Seed
         * ------------------
         */

        // DB::table('wedding_galleries')->truncate();
        // echo "Truncate: wedding_galleries \n";

        $weddings = Wedding::all();
        foreach ($weddings as $wedding) {
            WeddingGallery::factory()->count(5)->create(['wedding_id' => $wedding->id]);
        }
        $rows = WeddingGallery::all();
        echo " Insert: wedding_galleries \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
