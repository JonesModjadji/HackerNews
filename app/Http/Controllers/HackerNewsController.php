<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HackerNewsController extends Controller
{
    //

    public function list()
    {
    	$response = Http::get('https://hacker-news.firebaseio.com/v0/newstories.json?print=pretty');

return view('hackernews',['data'=>$response]);
    }
}
