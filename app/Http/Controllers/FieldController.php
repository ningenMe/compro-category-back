<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class FieldController extends Controller
{

    /**
     * field read 
     * 全件取得
     *
     * @return fields
     */
    public function all ()
    {
        $fields = \App\Field::all();
        return view('category', ['fields' => $fields]);
    }

    /**
     * field read 
     * 1件取得
     *
     * @return field
     */
    public function find (Request $request, $id)
    {
        $field = \App\Field::find($id);
        return view('category/edit/'.$id)->with('field',$field);
    }

    /**
     * field create 
     * 1件追加
     *
     * @param  Request $request
     * @return Responses
     */
    public function create (Request $request)
    {
        $field = new \App\Field();
        
        //DBに追加
        $field->name = $request->input('name');
        $field->order = $request->input('order');
        $field->save();

        $resopnse = redirect('/');
        return $resopnse;
    }

    /**
     * field delete 
     * 1件削除
     *
     * @param  Request $request
     * @return Responses
     */
    public function delete (Request $request)
    {

        $resopnse = redirect('/');
        return $resopnse;
    }

    /**
     * field update 
     * 1件更新
     *
     * @param  Request $request
     * @return Responses
     */
    public function update (Request $request)
    {

        $resopnse = redirect('/');
        return $resopnse;
    }

    

}
