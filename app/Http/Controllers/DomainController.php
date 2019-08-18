<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\DomainRequest;

class DomainController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = \App\Domain::all();
        return $domains;
    }

    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function labelfind(Request $request)
    {
        $label = $request->label;
        $fields = \App\Field::where("label",$label)->first();
        if(is_null($fields)) return [];
        
        $fields_id = $fields->id;
        $domains = \App\Domain::where("fields_id",$fields_id)->get();
        foreach($domains as $domain) {
            $domain["problems"] = \App\Problem::where('domains_id',$domain["id"])->orderBy('estimation')->get();
        }
        return $domains;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FieldRequest $request)
    {
        $domain = new \App\Domain();
        
        //DBに追加
        // $field->name = $request->input('name');
        // $field->label = $request->input('label');
        // $field->order = $request->input('order');
        // $field->save();
//        return redirect($this->prefix);
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
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(DomainRequest $request, Domain $domain)
    {
//        return view('fields.edit', ['field' => $field]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(FieldRequest $request, Domain $domain)
    {
        // $field->name = $request->name;
        // $field->label = $request->label;
        // $field->order = $request->order;
        // $field->save();
        // return redirect($this->prefix.'/'.$field->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function delete(DomainRequest $request, Domain $domain)
    {
        $domain->delete();
//        return redirect($this->prefix);    
    }
}
