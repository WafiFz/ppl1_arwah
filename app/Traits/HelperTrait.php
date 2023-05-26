<?php

namespace App\Traits;

trait HelperTrait
{
    public static function dateID($date)
    {
        return \Carbon\Carbon::parse($date)->locale('id')->isoFormat('dddd, D MMMM Y');
    }
}