<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = \App\Genre::orderBy('order','asc')->get();
        return $genres;
    }

    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $label = $request->label;
        $genre = \App\Genre::where("label",$label)->first();
        if(is_null($genre)) return [];
        return $genre;
    }

    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findWithTopics(Request $request)
    {
        $label = $request->label;
        $genre = \App\Genre::where("label",$label)->first();
        if(is_null($genre)) return [];
        $genre_id = $genre->genre_id;

        $topics = DB::table('topics')
        ->select('topics.topic_id as topic_id','topics.order as order','topics.name as topic_name','tasks.task_id as task_id','tasks.name as task_name', 'url', 'estimation')
        ->where('genre_id', '=', $genre_id)
        ->where('topics.deleted_at', '=', null)
        ->leftjoin('tags','topics.topic_id','=','tags.topic_id')
        ->leftjoin('tasks','tags.task_id','=','tasks.task_id')
        ->where('tasks.deleted_at', '=', null)
        ->get();

        //tasksを配列に成形
        $topics_with_tasks = array();
        foreach($topics as $topic){
            $topic_id = $topic->topic_id;
            $topics_with_tasks[$topic_id]["topic_id"]   = $topic_id;
            $topics_with_tasks[$topic_id]["topic_name"] = $topic->topic_name;
            $topics_with_tasks[$topic_id]["order"]      = $topic->order;
            //null処理
            if(isset($topic->task_id)) {
                $task = array(
                    "task_id"    => $topic->task_id,
                    "task_name"  => $topic->task_name,
                    "url"        => $topic->url,
                    "estimation" => $topic->estimation,
                );
                $topics_with_tasks[$topic_id]["tasks"][]  = $task;
            }
        }

        //topicをorderでソート
        $sort_by_order = array();
        foreach($topics_with_tasks as $key_order => &$val_order){
            $sort_by_order[$key_order] = $val_order['order'];
            
            //taskをestimationでソート
            if(isset($val_order["tasks"])){
                $sort_by_estimation = array();
                foreach($val_order["tasks"] as $key_estimation => $val_estimation){
                    $sort_by_estimation[$key_estimation] = $val_estimation['estimation'];
                } 
                array_multisort($sort_by_estimation,SORT_ASC,$val_order["tasks"]);
            } 
        }
        array_multisort($sort_by_order,SORT_ASC,$topics_with_tasks);

        $genre->topics = $topics_with_tasks;
        return $genre;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GenreRequest $request)
    {
        $genre = new \App\Genre();
        
        //DBに追加
        $genre->name = $request->input('name');
        $genre->label = $request->input('label');
        $genre->order = $request->input('order');
        try{
            $genre->save();
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
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request)
    {
        $label = $request->label;
        $genre = \App\Genre::where("label",$label)->first();
        $genre->name = $request->name;
        $genre->order = $request->order;
        $response;
        try{
            $genre->save();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $label = $request->label;
        $genre = \App\Genre::where("label",$label)->first();
        $response;
        try{
            $genre->delete();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }


}
