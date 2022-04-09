<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
use Laratrust\Traits\LaratrustUserTrait;
class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'org',
        'phone',
        'address',
        'country',
        'latitude',
        'longitude',
        'number_of_employees',
        'number_of_volunteers',
        'website',
        'role',
        'sdg1',
        'sdg2',
        'sdg3',
        'sdg4',
        'sdg5',
        'sdg6',
        'sdg7',
        'sdg8',
        'sdg9',
        'sdg10',
        'sdg11',
        'sdg12',
        'sdg13',
        'sdg14',
        'sdg15',
        'sdg16',
        'sdg17',
        //'subscription_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role ($role) {
        $role = (array)$role;

        return in_array($this->role,$role);}
    }



 
