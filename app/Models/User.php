<?php

namespace App\Models;

use App\Traits\ModelHelpers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable, ModelHelpers;

    const DEFAULT = 1;
    const ADMIN = 2;

    const TABLE = 'users';

    protected $table =self::TABLE;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        //'username', 
        //'phone',
        //'address',
        //'city',
        //'country',
       // 'postcode',
        //'number_of_employees',
        //'number_of_volunteers',
        //'website',
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

    public function id(): int
    {
        return $this->name;
    }

    public function name(): string
    {
        return $this->id;
    }

    public function emailAddress(): string
    {
        return $this->email;
    }



    public function type(): int
    {
        return(int) $this->type;
    }

    public function isAdmin(): bool
    {
        return $this->type() === self::ADMIN;
    }

} 
