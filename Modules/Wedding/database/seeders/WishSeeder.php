<?php

namespace Modules\Wedding\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Wedding\Entities\Wish;
use Modules\Wedding\Entities\Wedding;

class WishSeeder extends Seeder
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
         * Wishes Seed
         * ------------------
         */

        // DB::table('wishes')->truncate();
        // echo "Truncate: wishes \n";

        $weddings = Wedding::all();
        foreach ($weddings as $wedding) {
            Wish::factory()->count(5)->create(['wedding_id' => $wedding->id]);
        }
        $rows = Wish::all();
        echo " Insert: wishes \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
