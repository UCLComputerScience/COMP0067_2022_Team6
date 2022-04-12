<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ResourceAdmin extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'resource_title', 'cover'];
}
