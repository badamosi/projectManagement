<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Response::macro('success', function ($data, $message = 'Operation Successfull!') {
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => $message,
            ]);
        });

        Response::macro('error', function ($message, $status_code) {
            return Response::json([
                'success' => false,
                'message' => $message,
            ], $status_code);
        });
    }
}
