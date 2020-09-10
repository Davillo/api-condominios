<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Condominium extends BaseModel
{
    use SoftDeletes;

    protected $table = 'condominiums';
    protected $softDelete = true;

    protected $searchable = [
        'name',
        'email'
    ];

    protected $appends = [
        'blocks'
    ];

    protected $hidden = [
        'pivot',
        'deleted_at'
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
