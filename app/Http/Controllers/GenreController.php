<?php

namespace App\Http\Controllers;

use App\Genre;
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

}
