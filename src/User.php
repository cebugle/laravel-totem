<?php

namespace Cebugle\Totem;

use Database\Factories\TotemUserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return TotemUserFactory
     */
    protected static function newFactory(): TotemUserFactory
    {
        return TotemUserFactory::new();
    }
}
