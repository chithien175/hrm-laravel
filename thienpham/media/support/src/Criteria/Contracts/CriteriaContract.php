<?php

namespace Botble\Support\Criteria\Contracts;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;

interface CriteriaContract
{
    /**
     * @param \Eloquent $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository);
}
