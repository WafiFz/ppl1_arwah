<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

// Modules
use Modules\Package;
use Modules\Theme;
use Modules\Order;
use Modules\Invitation;
use Modules\Wedding;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(AuthTableSeeder::class);
        $this->call(Package\database\seeders\PackageDatabaseSeeder::class);
        $this->call(Theme\database\seeders\ThemeDatabaseSeeder::class);
        $this->call(Order\database\seeders\OrderDatabaseSeeder::class);
        $this->call(Invitation\database\seeders\InvitationTypeSeeder::class);
        $this->call(Invitation\database\seeders\InvitationDatabaseSeeder::class);
        $this->call(Invitation\database\seeders\GuestSeeder::class);
        $this->call(Invitation\database\seeders\RsvpSeeder::class);
        $this->call(Wedding\database\seeders\WeddingDatabaseSeeder::class);
        $this->call(Wedding\database\seeders\GroomSeeder::class);
        $this->call(Wedding\database\seeders\BrideSeeder::class);
        $this->call(Wedding\database\seeders\WishSeeder::class);
        $this->call(Wedding\database\seeders\GiftSeeder::class);
        $this->call(Wedding\database\seeders\WeddingEventSeeder::class);
        $this->call(Wedding\database\seeders\WeddingLoveStorySeeder::class);
        $this->call(Wedding\database\seeders\WeddingGallerySeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
