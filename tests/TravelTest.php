<?php

namespace RachidLaasri\Travel\Tests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use RachidLaasri\Travel\Travel;

class TravelTest extends TestCase
{
    /** @test */
    public function it_can_travel_to_a_datetime()
    {
        Travel::to('29-11-2000 07:57:18');
        $this->assertEquals('29-11-2000 07:57:18', Carbon::now()->format('d-m-Y H:i:s'));

        Travel::to('-3 minutes');
        $this->assertEquals('29-11-2000 07:54:18', Carbon::now()->format('d-m-Y H:i:s'));

        Travel::to('2years 1hour 5seconds');
        $this->assertEquals('29-11-2002 08:54:23', Carbon::now()->format('d-m-Y H:i:s'));
    }

    /** @test */
    public function it_resets_to_current_datetime_if_callback_is_provided()
    {
        Travel::to('22-04-1994');
        $this->assertEquals('22-04-1994', Carbon::now()->format('d-m-Y'));

        Travel::to('22-04-1995', function () {
            // Do something!
        });
        $this->assertNotEquals('22-04-1995', Carbon::now()->format('d-m-Y'));
    }

    /** @test */
    public function it_can_travel_back_to_current_datetime()
    {
        $today = Carbon::now();

        Travel::to('22-04-1994');
        $this->assertEquals('22-04-1994', Carbon::now()->format('d-m-Y'));

        Travel::back();
        $this->assertEquals($today->format('d-m-Y'), Carbon::now()->format('d-m-Y'));
    }
}
