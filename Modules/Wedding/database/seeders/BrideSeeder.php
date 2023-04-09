<?php

namespace Modules\Wedding\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Wedding\Entities\Bride;
use Modules\Wedding\Entities\Wedding;

class BrideSeeder extends Seeder
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
         * Brides Seed
         * ------------------
         */

        // DB::table('brides')->truncate();
        // echo "Truncate: brides \n";

        $weddings = Wedding::all();
        foreach ($weddings as $wedding) {
            Bride::factory()->create(['wedding_id' => $wedding->id]);
        }
        $rows = Bride::all();
        echo " Insert: brides \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
