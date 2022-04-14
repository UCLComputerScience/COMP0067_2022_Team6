<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'resource_title', 'cover', 'resource_description', 'resource_sdg', 'resource_language', 'resource_added_date'];
}
