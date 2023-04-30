<?php

namespace Modules\Wedding\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Wedding\Entities\Gift;
use Modules\Wedding\Entities\Wedding;

class GiftSeeder extends Seeder
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
         * Gifts Seed
         * ------------------
         */

        // DB::table('gifts')->truncate();
        // echo "Truncate: gifts \n";

        $weddings = Wedding::all();
        foreach ($weddings as $wedding) {
            Gift::factory()->count(5)->create(['wedding_id' => $wedding->id]);
        }
        $rows = Gift::all();
        echo " Insert: gifts \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
