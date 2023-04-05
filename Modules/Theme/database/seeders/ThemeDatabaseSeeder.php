<?php

namespace Modules\Theme\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Entities\Theme;

class ThemeDatabaseSeeder extends Seeder
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
         * Themes Seed
         * ------------------
         */

        // DB::table('themes')->truncate();
        // echo "Truncate: themes \n";

        Theme::factory()->count(20)->create();
        $rows = Theme::all();
        echo " Insert: themes \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
