<?php

namespace App\Observers;

use App\Facades\Pterodactyl;
use App\Models\Plan;
use Laravel\Cashier\Subscription;

class SubscriptionObserver
{

    public function created(Subscription $subscription)
    {
        if ($subscription->wasRecentlyCreated || $subscription->wasChanged('stripe_status'))
            if ($subscription->stripe_status == 'active') {
                $this->createOrUnsuspendServer($subscription);
                return;
            }
        $this->suspendServer($subscription);
    }

    public function createOrUnsuspendServer(Subscription $subscription)
    {
        if (!isset($subscription->server_id)) {
            $plan = Plan::where('price_id', $subscription->stripe_plan)->firstOrFail();
            Pterodactyl::createServer([
                'user' => $subscription->owner->pterodactyl_id,
                'name' => $subscription->name,
                'limits' => [
                    'memory' => $plan->memory,
                    'cpu' => $plan->cpu,
                    'disk' => $plan->disk,
                    'swap' => $plan->swap,
                    'io' => $plan->io
                ],
                'feature_limits' => [
                    'databases' => $plan->databases,
                    'backups' => $plan->backups,
                    'allocations' => $plan->allocations
                ],
            ]);
            return;
        } elseif ($subscription->server_suspended) {
            Pterodactyl::unsuspendServer($subscription->server_id);
        }
        $subscription->server_suspended = false;
        $subscription->saveQuietly();
    }

    public function suspendServer(Subscription $subscription)
    {
        if (isset($subscription->server_id) && !$subscription->server_suspended) {
            Pterodactyl::suspendServer($subscription->server_id);
            $subscription->server_suspended = true;
            $subscription->saveQuietly();
        }
    }
}

