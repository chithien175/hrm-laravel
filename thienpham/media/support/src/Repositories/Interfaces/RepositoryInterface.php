<?php

namespace Botble\Support\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    /**
     * @return string
     * @author Sang Nguyen
     */
    public function getScreen() : string;

    /**
     * @param $data
     * @param $screen
     * @return Builder
     * @author Sang Nguyen
     */
    public function applyBeforeExecuteQuery($data, $screen);

    /**
     * Get empty model.
     * @return mixed
     * @author Sang Nguyen
     */
    public function getModel();

    /**
     * Get table name.
     *
     * @return string
     * @author Sang Nguyen
     */
    public function getTable();

    /**
     * Make a new instance of the entity to query on.
     *
     * @param array $with
     * @author Sang Nguyen
     */
    public function make(array $with = []);

    /**
     * Find a single entity by key value.
     *
     * @param array $condition
     * @param array $select
     * @param array $with
     * @return mixed
     * @author Sang Nguyen
     */
    public function getFirstBy(array $condition = [], array $select = [], array $with = []);

    /**
     * Retrieve model by id regardless of status.
     *
     * @param $id
     * @param array $with
     * @return mixed
     * @author Sang Nguyen
     */
    public function findById($id, array $with = []);

    /**
     * @param $id
     * @param array $with
     * @return mixed
     * @author Sang Nguyen
     */
    public function findOrFail($id, array $with = []);

    /**
     * @param string $column
     * @param string $key
     * @return mixed
     * @author Sang Nguyen
     */
    public function pluck($column, $key = null);

    /**
     * Get all models.
     *
     * @param array $with Eager load related models
     * @return mixed
     * @author Sang Nguyen
     */
    public function all(array $with = []);

    /**
     * Get all models by key/value.
     *
     * @param array $condition
     * @param array $with
     * @param array $select
     * @author Sang Nguyen
     * @return Collection
     */
    public function allBy(array $condition, array $with = [], array $select = ['*']);

    /**
     * @param array $data
     * @return mixed
     * @author Sang Nguyen
     */
    public function create(array $data);

    /**
     * Create a new model.
     *
     * @param Model|array $data
     * @param array $condition
     * @return false|Model
     * @author Sang Nguyen
     */
    public function createOrUpdate($data, $condition = []);

    /**
     * Delete model.
     *
     * @param Model $model
     * @return bool
     * @author Sang Nguyen
     */
    public function delete(Model $model);

    /**
     * @param array $data
     * @param array $with
     * @return mixed
     * @author Sang Nguyen
     */
    public function firstOrCreate(array $data, array $with = []);

    /**
     * @param array $condition
     * @param array $data
     * @return mixed
     * @author Sang Nguyen
     */
    public function update(array $condition, array $data);

    /**
     * @param array $select
     * @param array $condition
     * @return mixed
     * @author Sang Nguyen
     */
    public function select(array $select = ['*'], array $condition = []);

    /**
     * @param array $condition
     * @return mixed
     * @author Sang Nguyen
     */
    public function deleteBy(array $condition = []);

    /**
     * @param array $condition
     * @return mixed
     * @author Sang Nguyen
     */
    public function count(array $condition = []);

    /**
     * @param $column
     * @param array $value
     * @param array $args
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author Sang Nguyen
     */
    public function getByWhereIn($column, array $value = [], array $args = []);

    /**
     * @param array $params
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|Collection|mixed
     */
    public function advancedGet(array $params = []);

    /**
     * @param array $condition
     */
    public function forceDelete(array $condition = []);

    /**
     * @param array $condition
     * @return mixed
     * @author Sang Nguyen
     */
    public function restoreBy(array $condition = []);

    /**
     * Find a single entity by key value.
     *
     * @param array $condition
     * @param array $select
     * @return mixed
     * @author Sang Nguyen
     */
    public function getFirstByWithTrash(array $condition = [], array $select = []);

    /**
     * @param array $data
     * @return bool
     * @author Sang Nguyen
     */
    public function insert(array $data);

    /**
     * @param array $condition
     * @return mixed
     */
    public function firstOrNew(array $condition);
}
