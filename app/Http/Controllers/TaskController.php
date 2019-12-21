<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //taskにtagsをleftjoin, tagsにtopicsをleftjoin
        $tasks = DB::table('tasks')
                ->select('tasks.task_id as task_id','tasks.name as name', 'url', 'estimation','tags.topic_id as topic_id','topics.name as topic_name')
                ->where('tasks.deleted_at', '=', null)
                ->leftjoin('tags','tasks.task_id','=','tags.task_id')
                ->leftjoin('topics','tags.topic_id','=','topics.topic_id')
                ->get();
                
        //tagsを配列に成形
        $tasks_with_tags = array();
        foreach($tasks as $task){
            $task_id = $task->task_id;
            $tasks_with_tags[$task_id]["task_id"]     = $task_id;
            $tasks_with_tags[$task_id]["name"]        = $task->name;
            $tasks_with_tags[$task_id]["url"]         = $task->url;
            $tasks_with_tags[$task_id]["estimation"]  = $task->estimation;
            //null処理
            if(isset($task->topic_id)) {
                $tag = array("topic_id" => $task->topic_id,"topic_name" => $task->topic_name);
                $tasks_with_tags[$task_id]["tags"][]  = $tag;
            }
        }

        //task_idで降順(新しい順)ソート
        krsort($tasks_with_tags);
        //純粋な配列じゃないとフロントで困る
        $tasks_with_tags = array_values($tasks_with_tags);
        return $tasks_with_tags;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $task_id = $request->task_id;
        //taskにtagsをleftjoin, tagsにtopicsをleftjoin
        $tasks = DB::table('tasks')
                ->select('tasks.task_id as task_id','tasks.name as name', 'url', 'estimation','tags.topic_id as topic_id','topics.name as topic_name')
                ->where('tasks.task_id', '=', $task_id)
                ->where('tasks.deleted_at', '=', null)
                ->leftjoin('tags','tasks.task_id','=','tags.task_id')
                ->leftjoin('topics','tags.topic_id','=','topics.topic_id')
                ->get();
                
        //tagsを配列に成形
        $task_with_tags = array();
        foreach($tasks as $task){
            $task_id = $task->task_id;
            $task_with_tags["task_id"]     = $task_id;
            $task_with_tags["name"]        = $task->name;
            $task_with_tags["url"]         = $task->url;
            $task_with_tags["estimation"]  = $task->estimation;
            //null処理
            if(isset($task->topic_id)) {
                $tag = array("topic_id" => $task->topic_id,"topic_name" => $task->topic_name);
                $task_with_tags["tags"][]  = $tag;
            }
        }
        // $task_with_tags = array_values($task_with_tags);
        return $task_with_tags;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TaskRequest $request)
    {
        $task = new \App\Task();
        
        //DBに追加
        $task->name       = $request->input('name');
        $task->url        = $request->input('url');
        $task->estimation = $request->input('estimation');

        try{
            $task->save();
        }catch(\Exception $e){
            $response["result"] = false;
            return $response;
        }
        
        $task_id = $task->task_id;
        $genre_topic_ids = $request->input('genre_topic_ids');
        $tags = array();
        foreach($genre_topic_ids as $topic_ids){
            foreach($topic_ids as $topic_id){
                $tags[] = array('topic_id' => $topic_id, 'task_id' => $task_id);
            }
        }
        try{
            DB::table('tags')->insert($tags);
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request)
    {
        $task_id = $request->task_id;
        $task = \App\Task::where("task_id",$task_id)->first();

        //DBに追加
        $task->name       = $request->input('name');
        $task->url        = $request->input('url');
        $task->estimation = $request->input('estimation');

        try{
            $task->save();
        }catch(\Exception $e){
            $response["result"] = false;
            return $response;
        }
        
        $task_id = $task->task_id;
        $genre_topic_ids = $request->input('genre_topic_ids');
        $tags = array();
        foreach($genre_topic_ids as $topic_ids){
            foreach($topic_ids as $topic_id){
                $tags[] = array('topic_id' => $topic_id, 'task_id' => $task_id);
            }
        }
        try{
            DB::table('tags')->where('task_id','=',$task_id)->delete();
            DB::table('tags')->insert($tags);
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
        $task_id = $request->task_id;
        $task = \App\Task::where("task_id",$task_id)->first();
        $response;
        try{
            DB::table('tags')->where('task_id','=',$task_id)->delete();
            $task->delete();
            $response["result"] = true;
        }catch(\Exception $e){
            $response["result"] = false;
        }
        return $response;
    }





}
