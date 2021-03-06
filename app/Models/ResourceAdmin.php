<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class ResourceAdmin extends Model
{
    use Sortable;

    protected $fillable = [
        'uuid',
        'resource_title',
        'cover',
        'resource_description',
        'resource_sdg',
        'resource_language',
        'resource_added_date'];

    public $sortable = [
        'resource_title',
        'cover',
        'resource_description',
        'resource_sdg',
        'resource_language',
        'resource_added_date'];
}
