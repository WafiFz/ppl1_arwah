<?php

namespace Modules\Invitation\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Invitation\Entities\InvitationType;

class InvitationTypeSeeder extends Seeder
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
         * Invitation_types Seed
         * ------------------
         */

        // DB::table('invitation_types')->truncate();
        // echo "Truncate: invitation_types \n";

        InvitationType::factory()->count(1)->create();
        $rows = InvitationType::all();
        echo " Insert: invitation_types \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
