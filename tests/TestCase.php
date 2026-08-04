<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Sandbox keeps storage/ read-only; re-point the Blade compiled-view
        // cache at a writable temp dir and drop the cached singletons so the
        // next resolution picks it up.
        $path = sys_get_temp_dir().'/sopal-view-compiled-'.getmypid();
        if (! is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $this->app->config->set('view.compiled', $path);
        $this->app->forgetInstance('blade.compiler');
        $this->app->forgetInstance('view.engine.resolver');
    }
}
