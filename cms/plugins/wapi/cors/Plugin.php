<?php namespace WApi\CORS;

use WApi\CORS\Classes\WzoHandleCors;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot() {
        
        $this->app['Illuminate\Contracts\Http\Kernel']
            ->prependMiddleware(WzoHandleCors::class);
    }
}
