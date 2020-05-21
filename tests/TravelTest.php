<?php

namespace RachidLaasri\Travel\Tests;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use PHPUnit\Framework\TestCase;
use RachidLaasri\Travel\Travel;

class TravelTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Travel::back();
    }

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

        $calledCount = 0;

        Travel::to('22-04-1995', function () use (&$calledCount) {
            $this->assertEquals(
                '22-04-1995',
                Carbon::now()->format('d-m-Y'),
                'Code inside the Closure should match the travel time.'
            );

            $calledCount++;
        });

        $this->assertEquals(1, $calledCount, 'Expect the closure to be called once.');
        $this->assertNotEquals('22-04-1995', Carbon::now()->format('d-m-Y'));
    }

    /** @test */
    public function it_can_loop_over_each_date_in_an_array()
    {
        $dates = ['22-04-1994', '22-04-1995', '29-11-2000'];

        $calledForDates = [];
        $calledCount = 0;

        Travel::each($dates, function () use (&$calledForDates, $dates, &$calledCount) {
            $calledForDates[] = Carbon::now()->format('d-m-Y');

            $this->assertEquals(
                $dates[$calledCount],
                Carbon::now()->format('d-m-Y'),
                'Code inside the Closure should match the travel time.'
            );

            $calledCount++;
        });

        $this->assertEquals($dates, $calledForDates);
        $this->assertNotEquals('29-11-2000', Carbon::now()->format('d-m-Y'));
    }

    /** @test */
    public function it_can_loop_over_each_date_in_a_carbon_period()
    {
        $period = CarbonPeriod::create('1994-04-22', '3 days', '1994-04-28');
        $dates = array_map(function (Carbon $date) {
            return $date->format('d-m-Y');
        }, $period->toArray());

        $calledForDates = [];
        $calledCount = 0;

        Travel::each($period, function () use (&$calledForDates, $dates, &$calledCount) {
            $calledForDates[] = Carbon::now()->format('d-m-Y');

            $this->assertEquals(
                $dates[$calledCount],
                Carbon::now()->format('d-m-Y'),
                'Code inside the Closure should match the travel time.'
            );

            $calledCount++;
        });

        $this->assertEquals($dates, $calledForDates);
        $this->assertNotEquals('28-04-1994', Carbon::now()->format('d-m-Y'));
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
