<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function hook (Request $request)
    {
        // $secret = $request->input('secret');
        shell_exec('touch /var/www/git/hoge.txt');
        return "test";
    }
}
