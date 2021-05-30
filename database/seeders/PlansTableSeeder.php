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
        $plans = [
            [
                'name' => '1gb',
                'cpu' => 150,
                'memory' => 1024,
                'disk' => 1024 * 50,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 125,
                'price_id' => 'price_1IvpaDL6eJXUuCVRYtNZvJIo'
            ],
            [
                'name' => '2gb',
                'cpu' => 150,
                'memory' => 2 * 1024,
                'disk' => 1024 * 50,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 250,
                'price_id' => 'price_1IwbKiL6eJXUuCVRIylfmJGz'
            ],
            [
                'name' => '3gb',
                'cpu' => 150,
                'memory' => 3 * 1024,
                'disk' => 1024 * 50,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 375,
                'price_id' => 'price_1IwakvL6eJXUuCVR6Xt9lwg3'
            ], [
                'name' => '4gb',
                'cpu' => 200,
                'memory' => 4 * 1024,
                'disk' => 1024 * 75,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 500,
                'price_id' => 'price_1Iwal9L6eJXUuCVR0hlkRRkH'
            ], [
                'name' => '5gb',
                'cpu' => 200,
                'memory' => 5 * 1024,
                'disk' => 1024 * 75,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 625,
                'price_id' => 'price_1IwbIaL6eJXUuCVR1NOaQIBa'
            ], [
                'name' => '6gb',
                'cpu' => 200,
                'memory' => 6 * 1024,
                'disk' => 1024 * 75,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 750,
                'price_id' => 'price_1IwalSL6eJXUuCVRm8BaJmyw'
            ], [
                'name' => '7gb',
                'cpu' => 250,
                'memory' => 7 * 1024,
                'disk' => 1024 * 100,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 875,
                'price_id' => 'price_1IwalnL6eJXUuCVRPemPgqkE'
            ], [
                'name' => '8gb',
                'cpu' => 250,
                'memory' => 8 * 1024,
                'disk' => 1024 * 100,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 1000,
                'price_id' => 'price_1IwalwL6eJXUuCVRYtvJiIpo'
            ], [
                'name' => '9gb',
                'cpu' => 250,
                'memory' => 9 * 1024,
                'disk' => 1024 * 100,
                'swap' => 0,
                'io' => 500,
                'databases' => 1,
                'backups' => 1,
                'allocations' => 3,
                'price' => 1125,
                'price_id' => 'price_1IwamDL6eJXUuCVR7M8iUn9y'
            ],
        ];

        Plan::insert($plans);
    }
}
