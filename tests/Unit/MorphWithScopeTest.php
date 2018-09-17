<?php

namespace Tests\Unit;

use App\Airline;
use App\AirlineApplication;
use App\User;
use App\Vendor;
use App\VendorApplication;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MorphWithScopeTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:fresh', ['--seed' => true]);
    }

    /** @test */
    public function it_works_accessing_the_individual_relationships_manually()
    {
        $airlineUser = User::whereOrganisationType(Airline::class)->first();
        $this->assertInstanceOf(Airline::class, $airlineUser->organisation);
        $this->assertInstanceOf(Airline::class, $airlineUser->organisationWithApplications);
        $this->assertInstanceOf(AirlineApplication::class, $airlineUser->organisation->applications->first());
        $this->assertInstanceOf(AirlineApplication::class, $airlineUser->organisationWithApplications->applications->first());

        $vendorUser = User::whereOrganisationType(Vendor::class)->first();
        $this->assertInstanceOf(Vendor::class, $vendorUser->organisation);
        $this->assertInstanceOf(Vendor::class, $vendorUser->organisationWithApplications);
        $this->assertInstanceOf(VendorApplication::class, $vendorUser->organisation->applications->first());
        $this->assertInstanceOf(VendorApplication::class, $vendorUser->organisationWithApplications->applications->first());
    }

    /** @test */
    public function it_works_by_loading_the_simple_morph_relationship()
    {
        $airlineUser = User::whereOrganisationType(Airline::class)->first();
        $airlineUser->load('organisation');

        $vendorUser = User::whereOrganisationType(Vendor::class)->first();
        $vendorUser->load('organisation');

        $this->assertTrue(true);
    }

    /** @test */
    public function it_works_by_loading_the_missing_relationship_with_scope_if_it_was_queried_before()
    {
        $airlineUser = User::whereOrganisationType(Airline::class)->first();
        $airlineUser->organisationWithApplications;
        $airlineUser->loadMissing('organisationWithApplications');

        $vendorUser = User::whereOrganisationType(Vendor::class)->first();
        $vendorUser->organisationWithApplications;
        $vendorUser->loadMissing('organisationWithApplications');

        $this->assertTrue(true);
    }

    /** @test */
    public function it_fails_by_loading_the_missing_relationship_with_scope_if_it_was_not_queried_before()
    {
        $airlineUser = User::whereOrganisationType(Airline::class)->first();
        $airlineUser->loadMissing('organisationWithApplications');

        $vendorUser = User::whereOrganisationType(Vendor::class)->first();
        $vendorUser->loadMissing('organisationWithApplications');

        $this->assertTrue(true);
    }

    /** @test */
    public function it_fails_by_loading_the_relationship_with_scope_if_it_was_queried_before()
    {
        $airlineUser = User::whereOrganisationType(Airline::class)->first();
        $airlineUser->organisationWithApplications;
        $airlineUser->load('organisationWithApplications');

        $vendorUser = User::whereOrganisationType(Vendor::class)->first();
        $vendorUser->organisationWithApplications;
        $vendorUser->load('organisationWithApplications');

        $this->assertTrue(true);
    }

    /** @test */
    public function it_fails_by_loading_the_relationship_with_scope_if_it_was_not_queried_before()
    {
        $airlineUser = User::whereOrganisationType(Airline::class)->first();
        $airlineUser->load('organisationWithApplications');

        $vendorUser = User::whereOrganisationType(Vendor::class)->first();
        $vendorUser->load('organisationWithApplications');

        $this->assertTrue(true);
    }
}
