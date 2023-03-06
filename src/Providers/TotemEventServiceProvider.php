<?php

namespace Cebugle\Totem\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class TotemEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        'Cebugle\Totem\Events\Created'     => ['Cebugle\Totem\Listeners\BustCache', 'Cebugle\Totem\Listeners\BuildCache'],
        'Cebugle\Totem\Events\Updated'     => ['Cebugle\Totem\Listeners\BustCache', 'Cebugle\Totem\Listeners\BuildCache'],
        'Cebugle\Totem\Events\Activated'   => ['Cebugle\Totem\Listeners\BustCache', 'Cebugle\Totem\Listeners\BuildCache'],
        'Cebugle\Totem\Events\Deactivated' => ['Cebugle\Totem\Listeners\BustCache', 'Cebugle\Totem\Listeners\BuildCache'],
        'Cebugle\Totem\Events\Deleting'    => ['Cebugle\Totem\Listeners\BustCacheImmediately'],
    ];
}
