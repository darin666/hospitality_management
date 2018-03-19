<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = \App\Task::all();
        return view('tasks.index',['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = \App\Task::all();
        $view = view('tasks.create',['tasks' => $tasks]);

        return $view;



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTask = new Task();
        $newTask->name = $request->get('name');
        $newTask->user_id = $request->get('user_id');
        $newTask->raisedBy_id = $request->get('raisedBy_id');
        $newTask->apartment_id = $request->get('apartment_id');
        $newTask->status_id = $request->get('status_id');
        $newTask->category_id = $request->get('category_id');
        $newTask->statusChange_id = $request->get('statusChange_id');
        $newTask->description = $request->get('description');
        $newTask->img_link = $request->get('img_link');
        $newTask->save();

        return redirect(action('TaskController@index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newTask = \App\Task::find($id);

        $view = view('tasks.show',['newTask'=>$newTask]);

        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
