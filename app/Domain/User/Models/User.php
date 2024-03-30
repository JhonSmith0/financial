<?php

namespace App\Domain\User\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable, HasUuids;

    public $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
}
