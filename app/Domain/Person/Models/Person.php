<?php

namespace App\Domain\Person\Models;

use AllowDynamicProperties;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static mixed create(array $arg)
 * @method static ?Model find(int $id)
 */
class Person extends Model
{
    protected $table = 'person';
    public $guarded = [];
}
