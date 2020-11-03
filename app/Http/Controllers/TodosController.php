<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckedTodoRequest;
use App\Http\Requests\DestroyTodoRequest;
use App\Http\Requests\EditTodoRequest;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Repositories\Interfaces\ITodo;
use Illuminate\Http\Request;

class TodosController extends Controller
{

    /**
     * @var ITodo
     */
    protected $repository;

    /**
     * TodosController constructor.
     * @param ITodo $repository
     */
    public function __construct(ITodo $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $extraFilter = ['status' => 'open'];
        return view('todos.index', ['todos' => $this->repository->allByUser(auth()->user(), $extraFilter), 'filter' => $extraFilter]);
    }

    public function filter(Request $request)
    {
        $extraFilter = $request->get('filter');
        return view('todos.index', ['todos' => $this->repository->allByUser(auth()->user(), $extraFilter), 'filter' => $extraFilter]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTodoRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $this->repository->create($data);
        return redirect()->route('todos.index');
    }

    /**
     * @param Todo $todo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(DestroyTodoRequest $request, $id)
    {
        $this->repository->delete($id);
        return redirect()->back();
    }

    /**
     * @param Todo $todo
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EditTodoRequest $request, $id)
    {
        return view('todos.edit', ['todo' => $this->repository->find($id)]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTodoRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        return redirect()->route('todos.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checked(CheckedTodoRequest $request, $id)
    {
        $this->repository->update(['status' => 'closed'], $id);
        return redirect()->route('todos.index');
    }
}
