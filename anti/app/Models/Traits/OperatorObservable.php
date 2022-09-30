<?php

namespace App\Models\Traits;

use App\Observers\OperatorObserver;

trait OperatorObservable
{
    public static function bootOperatorObservable()
    {
        self::observe(OperatorObserver::class);
    }
}
