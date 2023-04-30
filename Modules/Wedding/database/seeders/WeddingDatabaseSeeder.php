<?php

namespace Modules\Wedding\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Wedding\Entities\Wedding;
use Modules\Invitation\Entities\Invitation;

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

        $invitations = Invitation::all();
        foreach ($invitations as $invitaion) {
            Wedding::factory()->create(['invitation_id' => $invitaion->id]);
        }
        $rows = Wedding::all();
        echo " Insert: weddings \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
