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
        $tasks_with_tags = array_values($tasks_with_tags);
        return $tasks_with_tags;
    }

}
