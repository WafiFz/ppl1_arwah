<?php

namespace Modules\Invitation\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Invitation\Entities\Guest;

class GuestSeeder extends Seeder
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
         * guests Seed
         * ------------------
         */

        // DB::table('guests')->truncate();
        // echo "Truncate: guests \n";

        Guest::factory()->count(100)->create();
        $rows = Guest::all();
        echo " Insert: guests \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
