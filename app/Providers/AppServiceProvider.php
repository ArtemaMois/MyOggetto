<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AccountService;
use App\Services\MailService;
use App\Services\MeetingService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind("account_service", AccountService::class);
        $this->app->bind("mail_service", MailService::class);
        $this->app->bind("meeting_service", MeetingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
