<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use Sortable;
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable, Billable;

    protected $table = 'users';

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $sortable = [
        'name',
        'email',
        'phone',
        'address',
        'country',
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
        'sdg17',];

    public function role ($role) {
        $role = (array)$role;

        return in_array($this->role,$role);}
    }




