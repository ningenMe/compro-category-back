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
    public function find(Request $request)
    {
        $id = $request->id;
        $domain = \App\Domain::where("id",$id)->first();
        if(is_null($domain)) return [];
        return $domain;
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
        $domains = \App\Domain::orderBy('order','asc')->where("fields_id",$fields_id)->get();
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
    public function create(DomainRequest $request)
    {
        $domain = new \App\Domain();
        
        //DBに追加
        $domain->fields_id = $request->input('fields_id');
        $domain->name = $request->input('name');
        $domain->order = $request->input('order');
        try{
            $domain->save();
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
    public function update(DomainRequest $request)
    {
        $id = $request->id;
        $domain = \App\Domain::where("id",$id)->first();
        $domain->name = $request->name;
        $domain->order = $request->order;
        $response;
        try{
            $domain->save();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $domain = \App\Domain::where("id",$id)->first();
        $response;
        try{
            $domain->delete();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }
}
