<?php

namespace Modules\Wedding\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Wedding\Entities\WeddingEvent;
use Modules\Wedding\Entities\Wedding;

class WeddingEventSeeder extends Seeder
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
         * wedding_events Seed
         * ------------------
         */

        // DB::table('wedding_events')->truncate();
        // echo "Truncate: wedding_events \n";

        $weddings = Wedding::all();
        $names = ['Akad Nikah', 'Resepsi', 'Unduh Mantu'];
        foreach ($weddings as $wedding) {
            foreach($names as $name){
                WeddingEvent::factory()->create([
                    'wedding_id' => $wedding->id,
                    'name' => $name,
                ]);
            }
        }
        $rows = WeddingEvent::all();
        echo " Insert: wedding_events \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
