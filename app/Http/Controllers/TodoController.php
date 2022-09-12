<?php

namespace App\Http\Controllers;

use App\Http\Requests\{TodoStoreRequest, TodoUpdateRequest};
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return TodoResource::collection(auth()->user()->todos);
    }

    public function show(Todo $todo)
    {
        $this->authorize('view', $todo);

        $todo->load('tasks');
        return new TodoResource($todo);
    }

    public function store(TodoStoreRequest $request)
    {
        $input = $request->validated();
        $todo = auth()->user()->todos()->create($input);

        return new TodoResource($todo);
    }

    public function update(Todo $todo, TodoUpdateRequest $request)
    {
        $this->authorize('udpate', $todo);

        $input = $request->validated();

        $todo->fill($input);
        $todo->save();

        return new TodoResource($todo->fresh());
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('destroy', $todo);

        $todo->delete();
    }

    public function addTask(Todo $todo, TodoStoreRequest $request)
    {
        $this->authorize('addTask', $todo);

        $input = $request->validated();

        $todoTask = $todo->tasks()->create($input);
        
        return new TodoResource($todoTask);
    }


}
