<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Pterodactyl extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'petro';
    }
}
