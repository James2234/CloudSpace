<?php

namespace App\Admin\Repositories;

use App\Models\PublishList as Model;
use Dcat\Admin\Form;
use Dcat\Admin\Repositories\EloquentRepository;

class PublishList extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

}
