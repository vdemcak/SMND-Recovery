<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Materials model
 *
 * @mixin Builder
 */
class Materials extends Model
{
    use HasFactory;

    protected $table = 'materials';

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
}
