<?php

use App\Airline;
use App\AirlineApplication;
use App\Application;
use App\Enums\ApplicationType;
use App\User;
use App\Vendor;
use App\VendorApplication;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->states('airline')->create();
        factory(User::class)->states('vendor')->create();

        Airline::first()
            ->applications()
            ->createMany([
                factory(AirlineApplication::class)->make(['type' => ApplicationType::IN_HOUSE])->toArray(),
                factory(AirlineApplication::class)->make(['type' => ApplicationType::COMMERCIAL])->toArray(),
            ]);

        Vendor::first()
            ->applications()
            ->createMany([
                factory(VendorApplication::class)->make(['type' => ApplicationType::IN_HOUSE])->toArray(),
                factory(VendorApplication::class)->make(['type' => ApplicationType::COMMERCIAL])->toArray(),
            ]);
    }
}
