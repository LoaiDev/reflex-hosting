<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;

class CreatePterodactylUser
{
    public function __construct()
    {
        //
    }

    public function handle(Verified $event)
    {
        $user = $event->user;

        if (!$user->hasPterodactylUser()) {
            $user->createPterodactylUser();
        }
    }
}
