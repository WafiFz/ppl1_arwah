<?php

namespace Modules\Wedding\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\Wedding;

class WeddingDatabaseSeeder extends Seeder
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
         * Weddings Seed
         * ------------------
         */

        // DB::table('weddings')->truncate();
        // echo "Truncate: weddings \n";

        Wedding::factory()->count(20)->create();
        $rows = Wedding::all();
        echo " Insert: weddings \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
