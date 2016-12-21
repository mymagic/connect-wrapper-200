<?php

namespace MyMagic\Connect\Facades;

use Illuminate\Support\Facades\Facade;

class Connect extends Facade{

    protected static function getFacadeAccessor(){

        return 'MyMagic\Connect';
    }
}