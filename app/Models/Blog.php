<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
   use SoftDeletes;

    protected $table = 'blog';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'image',
        'inner_desc',
        'content_blocks',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'content_blocks' => 'array',
    ];

    protected $dates = [
        'deleted_at',
    ];
}
