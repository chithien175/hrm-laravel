<?php

namespace Botble\Support\Repositories\Eloquent;

use Botble\Support\Criteria\AbstractCriteria;
use Botble\Support\Criteria\Contracts\CriteriaContract;
use Botble\Support\Repositories\Interfaces\RepositoryInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class RepositoriesAbstract implements RepositoryInterface
{
    /**
     * @var Eloquent | Model
     */
    protected $model;

    /**
     * @var Eloquent | Model
     */
    protected $originalModel;

    /**
     * @var array
     */
    protected $criteria = [];

    /**
     * @var bool
     */
    protected $skipCriteria = false;

    /**
     * @var string
     */
    protected $screen = '';

    /**
     * RepositoriesAbstract constructor.
     * @param Model|Eloquent $model
     * @author Sang Nguyen
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->originalModel = $model;
    }

    /**
     * @return string
     * @author Sang Nguyen
     */
    public function getScreen() : string
    {
        return $this->screen;
    }

    /**
     * @param $data
     * @param $screen
     * @return Builder
     * @author Sang Nguyen
     */
    public function applyBeforeExecuteQuery($data, $screen)
    {
        if (is_in_admin()) {
            $data = apply_filters(BASE_FILTER_BEFORE_GET_ADMIN_LIST_ITEM, $data, $this->originalModel, $screen);
        } else {
            $data = apply_filters(BASE_FILTER_BEFORE_GET_FRONT_PAGE_ITEM, $data, $this->originalModel, $screen);
        }

        $this->resetModel();
        return $data;
    }

    /**
     * Get empty model.
     *
     * @return object
     * @author Sang Nguyen
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get table name.
     *
     * @return string
     * @author Sang Nguyen
     */
    public function getTable()
    {
        return $this->model->getTable();
    }

    /**
     * @return array
     * @author Tedozi Manson
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * @param CriteriaContract $criteria
     * @return $this
     * @author Tedozi Manson
     */
    public function pushCriteria(CriteriaContract $criteria)
    {
        $this->criteria[get_class($criteria)] = $criteria;
        return $this;
    }

    /**
     * @param AbstractCriteria|string $criteria
     * @return $this
     * @author Tedozi Manson
     */
    public function dropCriteria($criteria)
    {
        $className = $criteria;
        if (is_object($className)) {
            $className = get_class($criteria);
        }

        if (isset($this->criteria[$className])) {
            unset($this->criteria[$className]);
        }
        return $this;
    }

    /**
     * @param bool $bool
     * @return $this
     * @author Tedozi Manson
     */
    public function skipCriteria($bool = true)
    {
        $this->skipCriteria = $bool;
        return $this;
    }

    /**
     * @return $this
     * @author Tedozi Manson
     */
    protected function applyCriteria()
    {
        if ($this->skipCriteria === true) {
            return $this;
        }
        $criteria = $this->getCriteria();
        if ($criteria) {
            foreach ($criteria as $cr) {
                $this->model = $cr->apply($this->model, $this);
            }
        }

        return $this;
    }

    /**
     * @param CriteriaContract $criteria
     * @return Collection|Eloquent|LengthAwarePaginator|null|mixed
     */
    public function getByCriteria(CriteriaContract $criteria)
    {
        return $criteria->apply($this->originalModel, $this);
    }

    /**
     * Find a single entity by key value.
     *
     * @param array $condition
     * @param array $select
     * @param array $with
     * @return mixed
     * @author Sang Nguyen
     */
    public function getFirstBy(array $condition = [], array $select = ['*'], array $with = [])
    {
        $this->applyCriteria();

        $this->make($with);

        if (!empty($select)) {
            $data = $this->model->where($condition)->select($select);
        } else {
            $data = $this->model->where($condition);
        }

        return $this->applyBeforeExecuteQuery($data, $this->screen)->first();
    }

    /**
     * Make a new instance of the entity to query on.
     *
     * @param array $with
     * @return mixed
     * @author Sang Nguyen
     */
    public function make(array $with = [])
    {
        if (!empty($with)) {
            $this->model = $this->model->with($with);
        }
        return $this->model;
    }

    /**
     * Retrieve model by id regardless of status.
     *
     * @param $id
     * @param array $with
     * @return mixed
     * @author Sang Nguyen
     */
    public function findById($id, array $with = [])
    {
        $this->applyCriteria();

        $data = $this->make($with)->where('id', $id)->first();
        $this->resetModel();
        return $data;
    }

    /**
     * @param $id
     * @param array $with
     * @return mixed
     * @author Sang Nguyen
     */
    public function findOrFail($id, array $with = [])
    {
        $this->applyCriteria();

        $data = $this->make($with)->findOrFail($id);
        $this->resetModel();
        return $data;
    }

    /**
     * Get all models.
     *
     * @param array $with Eager load related models
     * @return mixed
     * @author Sang Nguyen
     */
    public function all(array $with = [])
    {
        $this->applyCriteria();

        $data = $this->make($with);

        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param string $column
     * @param string $key
     * @return mixed
     * @author Sang Nguyen
     */
    public function pluck($column, $key = null)
    {
        $this->applyCriteria();

        $select = [$column];
        if (!empty($key)) {
            $select = [$column, $key];
        }

        $data = $this->model->select($select);

        return $this->applyBeforeExecuteQuery($data, $this->screen)->pluck($column, $key)->all();
    }

    /**
     * Get all models by key/value.
     *
     * @param array $condition
     * @param array $with
     * @param array $select
     * @author Sang Nguyen
     * @return Collection
     */
    public function allBy(array $condition, array $with = [], array $select = ['*'])
    {
        $this->applyCriteria();

        $this->applyConditions($condition);

        $data = $this->make($with)->select($select);
        return $this->applyBeforeExecuteQuery($data, $this->screen)->get();
    }

    /**
     * @param array $data
     * @return mixed
     * @author Sang Nguyen
     */
    public function create(array $data)
    {
        $data = $this->model->create($data);
        $this->resetModel();
        return $data;
    }

    /**
     * Create a new model.
     *
     * @param $data
     * @param array $condition
     * @return false|Model
     * @author Sang Nguyen
     */
    public function createOrUpdate($data, $condition = [])
    {
        /**
         * @var Model $item
         */
        if (is_array($data)) {
            if (empty($condition)) {
                $item = new $this->model;
            } else {
                $item = $this->getFirstBy($condition);
            }
            if (empty($item)) {
                $item = new $this->model;
            }

            $item = $item->fill($data);
        } elseif ($data instanceof Model) {
            $item = $data;
        } else {
            return false;
        }

        if ($item->save()) {
            $this->resetModel();
            return $item;
        }

        $this->resetModel();

        return false;
    }

    /**
     * Delete model.
     *
     * @param Model $model
     * @return bool
     * @author Sang Nguyen
     * @throws \Exception
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * @param array $data
     * @param array $with
     * @return mixed
     * @author Sang Nguyen
     */
    public function firstOrCreate(array $data, array $with = [])
    {
        $this->applyCriteria();

        $data = $this->model->firstOrCreate($data, $with);

        $this->resetModel();

        return $data;
    }

    /**
     * @param array $condition
     * @param array $data
     * @return mixed
     * @author Sang Nguyen
     */
    public function update(array $condition, array $data)
    {
        $data = $this->model->where($condition)->update($data);
        $this->resetModel();
        return $data;
    }

    /**
     * @param array $select
     * @param array $condition
     * @return mixed
     * @author Sang Nguyen
     */
    public function select(array $select = ['*'], array $condition = [])
    {
        $data = $this->model->where($condition)->select($select);
        return $this->applyBeforeExecuteQuery($data, $this->screen);
    }

    /**
     * @param array $condition
     * @return bool
     * @author Sang Nguyen
     */
    public function deleteBy(array $condition = [])
    {
        $this->applyConditions($condition);

        $data = $this->model->get();

        if (empty($data)) {
            return false;
        }
        foreach ($data as $item) {
            $item->delete();
        }
        $this->resetModel();
        return true;
    }

    /**
     * @param array $condition
     * @return mixed
     * @author Sang Nguyen
     */
    public function count(array $condition = [])
    {
        $this->applyConditions($condition);
        $this->applyCriteria();
        $data = $this->model->count();

        $this->resetModel();

        return $data;
    }

    /**
     * @param $column
     * @param array $value
     * @param array $args
     * @return \Illuminate\Database\Eloquent\Collection|LengthAwarePaginator|mixed
     * @author Sang Nguyen
     */
    public function getByWhereIn($column, array $value = [], array $args = [])
    {
        $data = $this->model->whereIn($column, $value);

        if (!empty(array_get($args, 'where'))) {
            $this->applyConditions($args['where']);
        }

        if (!empty(array_get($args, 'paginate'))) {
            $data = $this->applyBeforeExecuteQuery($data, $this->screen)->paginate($args['paginate']);
        } elseif (!empty(array_get($args, 'limit'))) {
            $data = $this->applyBeforeExecuteQuery($data, $this->screen)->limit($args['limit']);
        } else {
            $data = $this->applyBeforeExecuteQuery($data, $this->screen)->get();
        }

        return $data;
    }

    /**
     * @return $this
     */
    public function resetModel()
    {
        $this->model = new $this->originalModel;
        $this->skipCriteria = false;
        $this->criteria = [];
        return $this;
    }

    /**
     * @param array $where
     * @param null|Eloquent|Builder $model
     */
    protected function applyConditions(array $where, &$model = null)
    {
        if (!$model) {
            $newModel = $this->model;
        } else {
            $newModel = $model;
        }
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                switch (strtoupper($condition)) {
                    case 'IN':
                        $newModel = $newModel->whereIn($field, $val);
                        break;
                    case 'NOT_IN':
                        $newModel = $newModel->whereNotIn($field, $val);
                        break;
                    default:
                        $newModel = $newModel->where($field, $condition, $val);
                        break;
                }
            } else {
                $newModel = $newModel->where($field, '=', $value);
            }
        }
        if (!$model) {
            $this->model = $newModel;
        } else {
            $model = $newModel;
        }
    }

    /**
     * @param array $params
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|Collection|mixed
     */
    public function advancedGet(array $params = [])
    {
        $this->applyCriteria();

        $params = array_merge([
            'condition' => [],
            'order_by' => [],
            'take' => null,
            'paginate' => [
                'per_page' => null,
                'current_paged' => 1,
            ],
            'select' => ['*'],
            'with' => [],
        ], $params);

        $this->applyConditions($params['condition']);

        $data = $this->model;

        if ($params['select']) {
            $data = $data->select($params['select']);
        }

        foreach ($params['order_by'] as $column => $direction) {
            if ($direction !== null) {
                $data = $data->orderBy($column, $direction);
            }
        }

        foreach ($params['with'] as $with) {
            $data = $data->with($with);
        }

        if ($params['take'] == 1) {
            $result = $this->applyBeforeExecuteQuery($data, $this->screen)->first();
        } elseif ($params['take']) {
            $result = $this->applyBeforeExecuteQuery($data, $this->screen)->take($params['take'])->get();
        } elseif ($params['paginate']['per_page']) {
            $paginate_type = 'paginate';
            if (array_get($params, 'paginate.type') && method_exists($data, array_get($params, 'paginate.type'))) {
                $paginate_type = array_get($params, 'paginate.type');
            }
            $result = $this->applyBeforeExecuteQuery($data, $this->screen)
                ->$paginate_type(
                    array_get($params, 'paginate.per_page', 10),
                    [$this->originalModel->getTable() . '.' . $this->originalModel->getKeyName()],
                    'page',
                    array_get($params, 'paginate.current_paged', 1)
                );
        } else {
            $result = $this->applyBeforeExecuteQuery($data, $this->screen)->get();
        }

        return $result;
    }

    /**
     * @param array $condition
     */
    public function forceDelete(array $condition = [])
    {
        $item = $this->model->where($condition)->withTrashed()->first();
        if (!empty($item)) {
            $item->forceDelete();
        }
    }

    /**
     * @param array $condition
     * @return mixed
     * @author Sang Nguyen
     */
    public function restoreBy(array $condition = [])
    {
        $item = $this->model->where($condition)->withTrashed()->first();
        if (!empty($item)) {
            $item->restore();
        }
    }

    /**
     * Find a single entity by key value.
     *
     * @param array $condition
     * @param array $select
     * @return mixed
     * @author Sang Nguyen
     */
    public function getFirstByWithTrash(array $condition = [], array $select = [])
    {
        $query = $this->model->where($condition)->withTrashed();

        if (!empty($select)) {
            return $query->select($select)->first();
        }

        return $this->applyBeforeExecuteQuery($query, $this->screen)->first();
    }

    /**
     * @param array $data
     * @return bool
     * @author Sang Nguyen
     */
    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    /**
     * @param array $condition
     * @return mixed
     */
    public function firstOrNew(array $condition)
    {
        $this->applyConditions($condition);

        $result = $this->model->first() ?: new $this->originalModel;

        $this->resetModel();

        return $result;
    }
}
