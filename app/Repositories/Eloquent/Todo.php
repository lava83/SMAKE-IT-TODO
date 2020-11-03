<?php
namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\Interfaces\ITodo;
use App\Models\Todo as TodoModel;
use Illuminate\Support\Collection;

/**
 * Class Todo
 * @package App\Repositories\Eloquent
 */
class Todo extends Base implements ITodo
{

    /**
     * @inheritdoc
     */
    public function __construct(TodoModel $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritdoc
     */
    public function allByUser(User $user, array $extraFilter = []): Collection
    {
        $q = $this->model->with(['user'])->whereUserId($user->getKey());
        if(!empty($extraFilter)) {
            foreach ($extraFilter as $columnName => $value) {
                $q->where($columnName, '=', $value);
            }
        }
        return $q->get();
    }

}
