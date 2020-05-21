<?php

namespace RachidLaasri\Travel;

use Carbon\Carbon;
use Closure;

class Travel
{
    /**
     * Travel to a given date time.
     *
     * @param mixed $date
     * @param Closure $callback
     * @return Carbon
     */
    public static function to($date, Closure $callback = null): Carbon
    {
        Carbon::setTestNow($date);

        if ($callback) {
            $callback();

            self::back();
        }

        return Carbon::now();
    }

    /**
     * Travel to each date given.
     *
     * @param mixed $dates
     * @param Closure $callback
     * @return void
     */
    public static function each($dates, Closure $callback): void
    {
        foreach ($dates as $date) {
            Carbon::setTestNow($date);

            $callback();
        }

        self::back();
    }

    /**
     * Travel back to the current date time.
     *
     * @return Carbon
     */
    public static function back(): Carbon
    {
        Carbon::setTestNow();

        return Carbon::now();
    }
}
