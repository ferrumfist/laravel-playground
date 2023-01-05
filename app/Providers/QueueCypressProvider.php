<?php

namespace App\Providers;

use App\Queue\CypressFailedJobProvider;
use Illuminate\Queue\QueueServiceProvider;

class QueueCypressProvider extends QueueServiceProvider
{
    protected function registerFailedJobServices()
    {
        $this->app->singleton('queue.failer', function ($app)
        {
            return new CypressFailedJobProvider();
        });
    }
}
