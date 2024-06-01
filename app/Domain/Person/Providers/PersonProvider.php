<?php

namespace App\Domain\Person\Providers;

use App\Domain\Person\Contracts\PersonRepositoryContract;
use App\Domain\Person\Contracts\PersonServiceContract;
use App\Domain\Person\Repositories\PersonRepository;
use App\Domain\Person\Services\PersonService;
use Illuminate\Support\ServiceProvider;

class PersonProvider extends ServiceProvider
{
    /**
     * @var array<string, string>
     */
    public $bindings = [
        PersonRepositoryContract::class => PersonRepository::class,
        PersonServiceContract::class => PersonService::class,
    ];
}
