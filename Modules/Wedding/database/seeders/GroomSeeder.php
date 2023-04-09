<?php

namespace Modules\Wedding\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Wedding\Entities\Groom;
use Modules\Wedding\Entities\Wedding;

class GroomSeeder extends Seeder
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
         * Grooms Seed
         * ------------------
         */

        // DB::table('grooms')->truncate();
        // echo "Truncate: grooms \n";

        $weddings = Wedding::all();
        foreach ($weddings as $wedding) {
            Groom::factory()->create(['wedding_id' => $wedding->id]);
        }
        $rows = Groom::all();
        echo " Insert: grooms \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
