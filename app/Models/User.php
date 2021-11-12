<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',

    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }

    public function hasCountries()
    {
        if ($this->countries->isEmpty()) {
            return false;
        }
        return true;
    }

    public function selectedCountries()
    {
        if ($this->countries->isEmpty()) {
            return null;
        }
        return $this->countries->pluck('id')->all();
    }

    public function setCountries($data)
    {
        $this->countries()->sync($data['countries']);
    }
}
