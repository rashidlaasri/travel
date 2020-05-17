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
