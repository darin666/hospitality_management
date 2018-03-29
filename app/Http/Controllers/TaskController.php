<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Apartment;
use App\User;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


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
        $shownApartments = Apartment::all();

        return view('tasks.index',compact('tasks', 'shownApartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = \App\Task::all();
        $apartments = \App\Apartment::all();
        $view = view('tasks.create',['tasks' => $tasks, 'apartments'=>$apartments]);


        return $view;



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
        $newTask = new Task();
        $newTask->user_id = \Auth::id();
        $newTask->name = $request->get('name');
        $newTask->raisedBy_id = \Auth::id();
        $newTask->apartment_id = $request->get('apartment_id');
        $newTask->status_id = $request->get('status_id');
        $newTask->category_id = $request->get('category_id');
        $newTask->description = $request->get('description');
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
        $newTask = \App\Task::findOrFail($id);
        $apartments = \App\Apartment::all();


        return view('tasks.edit', compact('newTask'));
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
        $newTask = \App\Task::findOrFail($id);
        $apartments = \App\Apartment::all();


        $newTask->update($request->all());
        // dd($user);

        return redirect('tasks');
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

    public function upload($id, UploadFileRequest $request)
    {
        $newTask = \App\Task::findOrFail($id);

		if(Input::hasFile('file')){
            if ($newTask->img_link !='' && Storage::disk('local')->exists('public/uploads/' . $newTask->img_link)) {
                Storage::disk('local')->delete('public/uploads/' . $newTask->img_link);
            }

            $file = Input::file('file');
            $future_name = uniqid() . '_' . $file->getClientOriginalName();
			$file->move('storage/uploads', $future_name);
            //echo '<img src="storage/uploads/' . $future_name . '" />';
            $newTask->img_link = $future_name;
            $newTask->save();

            return redirect(action('TaskController@show', [$newTask->id]));
        }
        return redirect()->back();
	}
}
