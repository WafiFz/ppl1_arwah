<?php

namespace Modules\Invitation\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Invitation\Entities\Rsvp;

class RsvpSeeder extends Seeder
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
         * rsvps Seed
         * ------------------
         */

        // DB::table('rsvps')->truncate();
        // echo "Truncate: rsvps \n";

        Rsvp::factory()->count(100)->create();
        $rows = Rsvp::all();
        echo " Insert: rsvps \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
