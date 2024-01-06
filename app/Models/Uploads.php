<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Uploads model
 *
 * @mixin Builder
 */
class Uploads extends Model
{
    use HasFactory;

    protected $table = 'uploads';

    protected $fillable = [
        'name',
        'files',
        'user_ip',
        'teacher',
        'year',
        'subject',
    ];

    protected $hidden = [
        'user_ip',
    ];

    protected $casts = [
        'files' => 'array',
    ];
}
