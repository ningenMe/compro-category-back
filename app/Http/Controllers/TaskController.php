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
                ->select('tasks.task_id as task_id','tasks.name as name', 'url', 'estimation','topics.name as tag' )
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
            $tasks_with_tags[$task_id]["tags"][]      = $task->tag;
            //タグは文字列にして渡す
            // if( empty($tasks_with_tags[$task_id]["tags"]) ) {
            //     $tasks_with_tags[$task_id]["tags"]    = $task->tag;
            // }
            // else{
            //     $tasks_with_tags[$task_id]["tags"]   .= ','.$task->tag;
            // }
        }

        //task_idで降順(新しい順)ソート
        krsort($tasks_with_tags);
        //純粋な配列じゃないとフロントで困る
        $tasks_with_tags = array_values($tasks_with_tags);
        return $tasks_with_tags;
    }

}
