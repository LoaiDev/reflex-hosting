<?php

namespace App\Http\Controllers;

use App\Facades\Pterodactyl;
use Arr;
use Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $userData = Pterodactyl::getUserWithServers(Auth::user()->pterodactyl_id);
        $servers = Arr::get($userData, 'attributes.relationships.servers.data');
        if (empty($servers)) {
            return redirect(route('products'));
        }
        return view('dashboard')->with('servers', $servers);
    }
}
