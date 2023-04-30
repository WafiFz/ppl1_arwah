<?php

namespace Modules\Invitation\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// Entities
use Modules\Invitation\Entities\Invitation;
use Modules\Order\Entities\Order;

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

        $orders = Order::all();
        foreach ($orders as $order) {
            Invitation::factory()->create(['order_id' => $order ->id]);
        }
        $rows = Invitation::all();
        echo " Insert: invitations \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
