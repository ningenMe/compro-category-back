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
        return $fields;
        //return view('fields.index', ['fields' => $fields]);
    }

    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $label = $request->label;
        $field = \App\Field::where("label",$label)->first();
        if(is_null($field)) return [];
        return $field;
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
        $field->label = $request->input('label');
        $field->order = $request->input('order');
        $response;
        try{
            $field->save();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
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
    public function edit(FieldRequest $request, Field $field)
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
    public function update(FieldRequest $request)
    {
        $id = $request->id;
        $field = \App\Field::where("id",$id)->first();
        $field->name = $request->name;
        $field->label = $request->label;
        $field->order = $request->order;
        $response;
        try{
            $field->save();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $field = \App\Field::where("id",$id)->first();
        $response;
        try{
            $field->delete();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }
}
