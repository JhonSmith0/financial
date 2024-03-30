<?php

use Illuminate\Support\Str;

if (!function_exists('uuid')) {
    function uuid()
    {
        return Str::uuid();
    }
}
