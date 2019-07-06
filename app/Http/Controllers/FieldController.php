<?php

namespace App\Http\Controllers;

use App\Field;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\FieldRequest;

class FieldController extends Controller
{

    private $prefix = '/fields';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = \App\Field::all();
        return view('fields.index', ['fields' => $fields]);
    }

    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FieldRequest $request)
    {
        $field = new \App\Field();
        
        //DBに追加
        $field->name = $request->input('name');
        $field->order = $request->input('order');
        $field->save();
        return redirect($this->prefix);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        return view('fields.edit', ['field' => $field]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        $field->name = $request->name;
        $field->order = $request->order;
        $field->save();
        return redirect($this->prefix.'/'.$field->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function delete(Field $field)
    {
        $field->delete();
        return redirect($this->prefix);    
    }
}
