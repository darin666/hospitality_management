<?php

namespace App\Http\Controllers;
use App\Task;

use Illuminate\Http\Request;

class TaskAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::all();
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'status_id' => 'integer',
            'apartment_id' => 'integer',
            'user_id' => 'integer',
            'raisedBy_id' => 'integer',
            'category_id' => 'integer',

        ]);

        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return response()->json($task, 200);
    }

    public function delete(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }


}
