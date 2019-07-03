<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function hook (Request $request)
    {
        // $secret = $request->input('secret');
        //shell_exec('touch /home/ec2-user/hoge.txt');
        return "test";
    }
}
