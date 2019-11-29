<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TopicRequest;

class TopicController extends Controller
{

    /**
     * Display a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function labelfind(Request $request)
    {
        $label = $request->label;
        $genres = \App\Genre::where("label",$label)->first();
        if(is_null($genres)) return [];
        
        $genres->genre_id;
        $topics = \App\Topic::orderBy('order','asc')->where("genre_id",$genres->genre_id)->get();
        // foreach($topics as $topic) {
        //     $topic["tasks"] = \App\Task::where('topics_id',$domain["id"])->orderBy('estimation')->get();
        // }
        return $topics;
    }

}
