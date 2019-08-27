<?php

namespace App\Http\Controllers;

use App\Problem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ProblemRequest;

class ProblemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems = \App\Problem::all();
        return $problems;
    }

    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $id = $request->id;
        $problem = \App\Problem::where("id",$id)->first();
        if(is_null($problem)) return [];
        return $problem;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProblemRequest $request)
    {
        $problem = new \App\Problem();
        
        //DBに追加
        $problem->domains_id = $request->input('domains_id');
        $problem->name = $request->input('name');
        $problem->url  = $request->input('url');
        $problem->score = $request->input('score');
        $problem->estimation = $request->input('estimation');
        try{
            $problem->save();
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
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function show(Problem $problem)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function update(ProblemRequest $request)
    {
        $id = $request->id;
        $problem = \App\Problem::where("id",$id)->first();
        $problem->name = $request->name;
        $problem->url = $request->url;
        $problem->score = $request->score;
        $problem->estimation = $request->estimation;
        $response;
        try{
            $problem->save();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Problem $problem
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $problem = \App\Problem::where("id",$id)->first();
        $response;
        try{
            $problem->delete();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }
}
