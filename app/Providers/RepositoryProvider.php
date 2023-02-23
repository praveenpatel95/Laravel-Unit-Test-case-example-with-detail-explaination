<?php

namespace App\Providers;

use App\Repository\Auth\Contracts\IUserRepository;
use App\Repository\Auth\UserRepository;
use App\Repository\Journal\Contracts\IJournalAccessUserRepository;
use App\Repository\Journal\Contracts\IJournalRepository;
use App\Repository\Journal\JournalAccessUserRepository;
use App\Repository\Journal\JournalRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IJournalRepository::class, JournalRepository::class);
        $this->app->bind(IJournalAccessUserRepository::class, JournalAccessUserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
