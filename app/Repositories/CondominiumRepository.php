<?php

namespace App\Repositories;

use App\Models\Block;
use App\Models\Condominium;
use App\Models\CondominiumBlock;

class CondominiumRepository extends BaseRepository
{

    function __construct(Condominium $condominium = null)
    {
        parent::__construct($condominium ?? new Condominium);
    }

}

