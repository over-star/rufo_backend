<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class UrlClass extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'url_help';
    }
}