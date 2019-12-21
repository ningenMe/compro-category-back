<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = \App\Tag::all();
        return $tags;
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
        $tags = DB::table('tags')
        ->select('tags.topic_id','genre_id')
        ->where('task_id', '=', $task_id)
        ->leftjoin('topics','tags.topic_id','=','topics.topic_id')
        ->where('deleted_at', '=', null)
        ->get();
        $genre_topic_ids = array();
        foreach($tags as $tag){
            $genre_topic_ids[$tag->genre_id][] = $tag->topic_id;
        }

        return $genre_topic_ids;
    }


}
