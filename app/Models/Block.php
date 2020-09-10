<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Block extends Model
{
    use SoftDeletes;

    protected $table = 'blocks';
    protected $softDelete = true;

    protected $fillable = [
        'number',
        'apartments_amount'
    ];

    protected $hidden = [
        'deleted_at',
        'pivot'
    ];

}
