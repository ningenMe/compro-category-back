<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function list ()
    {
        $fields = \App\Field::all();
//        return \Response::json(['fields' => $fields]);
//        return ['fields' => $fields];
        return view('category', ['fields' => $fields]);
    }
}
