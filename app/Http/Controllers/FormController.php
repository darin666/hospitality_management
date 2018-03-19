<?php

namespace App\Http\Controllers;

use App\Form;                               // model included here
use App\Apartment;
use App\Http\Requests;
use App\Http\Requests\CreateFormRequest;
use App\Http\Requests\UpdateFormRequest;


//use Request;
// changed from Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::latest('updated_at')->get();

        return view ('forms/index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $shownApartment = \App\Apartment::find($id);

        return view('forms/create', compact( 'shownApartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateFormRequest $request)
    {
        // validation in CreateFormRequest

        Form::create($request->all());

        // might want to use Carbon::now() in the future

        return redirect('form');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Form::findOrFail($id);
        $shownApartment = \App\Apartment::find($id);

        return view('forms/show', compact('form', 'shownApartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Form::findOrFail($id);
        $shownApartment = \App\Apartment::find($form->apartment_id);

        return view('forms/edit', compact('form',  'shownApartment')); // passing $form in compact
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateFormRequest $request)
    {
        $form = Form::findOrFail($id);

        $form->update($request->all());

        return redirect('form');
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
