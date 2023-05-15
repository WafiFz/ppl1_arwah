<?php

namespace Modules\Package\database\seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Package\Entities\Package;

class PackageDatabaseSeeder extends Seeder
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
         * Packages Seed
         * ------------------
         */

        // DB::table('packages')->truncate();
        // echo "Truncate: packages \n";

        // Package::factory()->count(5)->create();

        Package::create([
            'name'              => 'Bronze',
            'price'             => 'Rp. 100.000 - Rp.200.000',
            'description'       => 'Paket yang memenuhi kebutuhan dasar undanganmu',
            'features'          => '<li>Informasi Dasar Pernikahan</li>',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        Package::create([
            'name'              => 'Silver',
            'price'             => 'Rp. 300.000 - Rp.400.000',
            'description'       => 'Pilihan paket membuat undanganmu lebih keren',
            'features'          => '<li>Informasi Dasar Pernikahan</li><li>Gallery</li><li>Konfirmasi Kehadiran</li>',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        Package::create([
            'name'              => 'Gold',
            'price'             => 'Rp. 500.000 - Rp.600.000',
            'description'       => 'Paket mewah lengkap untuk undanganmu',
            'features'          => '<li>Informasi Dasar Pernikahan</li><li>Gallery</li><li>Konfirmasi Kehadiran</li><li>Wish</li><li>Gift</li><li>Save to Google Calendar</li>',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        $rows = Package::all();
        echo " Insert: packages \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
