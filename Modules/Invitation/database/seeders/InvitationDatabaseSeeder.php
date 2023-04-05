<?php

namespace Modules\Invitation\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\Invitation;

class InvitationDatabaseSeeder extends Seeder
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
         * Invitations Seed
         * ------------------
         */

        // DB::table('invitations')->truncate();
        // echo "Truncate: invitations \n";

        Invitation::factory()->count(20)->create();
        $rows = Invitation::all();
        echo " Insert: invitations \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
