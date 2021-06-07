<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (config('app.env') == 'production') {
            $prices = [
                'price_1IwqevLIUT0hKcoSJdDVmp4h',
                'price_1Iwqh9LIUT0hKcoSsZAoCihQ',
                'price_1IwqiWLIUT0hKcoSAh3yIEQZ',
                'price_1IwqiuLIUT0hKcoSdO1LOJdi',
                'price_1IwqjFLIUT0hKcoStp5DAwuN',
                'price_1Iwqk0LIUT0hKcoS3HerTJap',
                'price_1IwqkJLIUT0hKcoSjtiNwcLx',
                'price_1IwqkbLIUT0hKcoSymFKQoMD',
                'price_1Iwql0LIUT0hKcoSkx88kkDM'
            ];

        } else {
            $prices = [
                'price_1IvpaDL6eJXUuCVRYtNZvJIo',
                'price_1IwbKiL6eJXUuCVRIylfmJGz',
                'price_1IwakvL6eJXUuCVR6Xt9lwg3',
                'price_1Iwal9L6eJXUuCVR0hlkRRkH',
                'price_1IwbIaL6eJXUuCVR1NOaQIBa',
                'price_1IwalSL6eJXUuCVRm8BaJmyw',
                'price_1IwalnL6eJXUuCVRPemPgqkE',
                'price_1IwalwL6eJXUuCVRYtvJiIpo',
                'price_1IwamDL6eJXUuCVR7M8iUn9y'
            ];
        }
        $plans = [
            [
                'name' => '1gb',
                'cpu' => 400,
                'memory' => 1024,
                'disk' => 1024 * 50,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 125,
            ],
            [
                'name' => '2gb',
                'cpu' => 400,
                'memory' => 2 * 1024,
                'disk' => 1024 * 50,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 250,
            ],
            [
                'name' => '3gb',
                'cpu' => 400,
                'memory' => 3 * 1024,
                'disk' => 1024 * 50,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 375,
            ], [
                'name' => '4gb',
                'cpu' => 400,
                'memory' => 4 * 1024,
                'disk' => 1024 * 75,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 500,
            ], [
                'name' => '5gb',
                'cpu' => 400,
                'memory' => 5 * 1024,
                'disk' => 1024 * 75,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 625,
            ], [
                'name' => '6gb',
                'cpu' => 400,
                'memory' => 6 * 1024,
                'disk' => 1024 * 75,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 750,
            ], [
                'name' => '7gb',
                'cpu' => 400,
                'memory' => 7 * 1024,
                'disk' => 1024 * 100,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 875,
            ], [
                'name' => '8gb',
                'cpu' => 400,
                'memory' => 8 * 1024,
                'disk' => 1024 * 100,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 1000,
            ], [
                'name' => '9gb',
                'cpu' => 400,
                'memory' => 9 * 1024,
                'disk' => 1024 * 100,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 1125,
            ],
        ];

        foreach ($plans as $index => $plan){
            $plans[$index]['price_id'] = $prices[$index];
        }

        Plan::insert($plans);
    }
}
