<?php

namespace App\Repositories;

use App\Models\Block;

class BlockRepository extends BaseRepository
{

    function __construct(Block $block = null)
    {
        parent::__construct($block ?? new Block);
    }

    
}

