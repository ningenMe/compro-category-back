<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TopicRequest;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = DB::table('topics')
        ->select('topic_id','topics.name as topic_name', 'genres.name as genre_name','label')
        ->where('topics.deleted_at', '=', null)
        ->leftjoin('genres','topics.genre_id','=','genres.genre_id')
        ->orderBy('topics.created_at','desc')
        ->get();

        return $topics;
    }

    
    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $topic_id = $request->topic_id;
        $topic = DB::table('topics')
        ->select('topic_id','topics.order as order','topics.name as topic_name','genres.genre_id as genre_id','genres.name as genre_name','label')
        ->where('topic_id', '=', $topic_id)
        ->where('topics.deleted_at', '=', null)
        ->leftjoin('genres','topics.genre_id','=','genres.genre_id')
        ->get();

        if(is_null($topic)) return [];
        return  json_decode(json_encode($topic[0]), true);;
    }


    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findWithTasks(Request $request)
    {
        $topic_id = $request->topic_id;

        $topics = \App\Topic::where("topic_id",$topic_id)->first();

        if(is_null($topics)){
            return [];
        }

        $tasks = DB::table('tags')
        ->where('topic_id', '=', $topic_id)
        ->leftjoin('tasks','tags.task_id','=','tasks.task_id')
        ->where('tasks.deleted_at', '=', null)
        ->orderBy('estimation','asc')
        ->get();
        
        $topics->tasks = $tasks;
        return $topics;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TopicRequest $request)
    {
        $topic = new \App\Topic();
        
        //DBに追加
        $topic->genre_id = $request->input('genre_id');
        $topic->name     = $request->input('name');
        $topic->order    = $request->input('order');
        try{
            $topic->save();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(TopicRequest $request)
    {
        $topic_id = $request->topic_id;
        $topic = \App\Topic::where("topic_id",$topic_id)->first();
        $topic->name      = $request->name;
        $topic->order     = $request->order;
        $topic->genre_id  = $request->genre_id;

        $response;
        try{
            $topic->save();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $topic_id = $request->topic_id;
        $topic = \App\Topic::where("topic_id",$topic_id)->first();
        $response;
        try{
            $topic->delete();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }




}
