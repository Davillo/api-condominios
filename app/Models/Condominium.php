<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condominium extends Model
{
    use SoftDeletes;

    protected $table = 'condominiums';
    protected $softDelete = true;

    protected $appends = [
        'blocks'
    ];

    protected $hidden = [
        'pivot'
    ];

    protected $fillable = [
        'name',
        'email'
    ];

    public function blocks()
    {
        return $this->belongsToMany(Block::class, 'condominium_blocks');
    }

    public function getBlocksAttribute(){
        return $this->blocks()->get();
    }
}
