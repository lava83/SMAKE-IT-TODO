<?php
/**
 * Copyright: 2020 - quadress GmbH
 * Date: 02.11.2020
 * Time: 15:22
 */

namespace App\Http\Requests;


use App\Repositories\Interfaces\ITodo;

class BaseIsMyTodoRequest extends BaseTodoRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $repository = app(ITodo::class);
        $todoId = $this->route('todo');
        $todo = $repository->find($todoId);
        $userId = auth()->id();
        return (int)$userId === (int)$todo->user->getKey();
    }

}
