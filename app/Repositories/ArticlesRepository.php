<?php

namespace App\Repositories;

use App\Models\Articles;
use InfyOm\Generator\Common\BaseRepository;

class ArticlesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Articles::class;
    }
}
