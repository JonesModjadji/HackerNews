<?php

namespace App\Http\Controllers;
ini_set('max_execution_time', 60);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use  Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use app\Models\hackernews;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class HackerController extends Controller
{
    //

    public function list()
    {
        $data1 = Http::get('https://hacker-news.firebaseio.com/v0/topstories.json?print=pretty')->json();
    	$data2 = Http::get('https://hacker-news.firebaseio.com/v0/newstories.json?print=pretty')->json();
        $data3 = Http::get('https://hacker-news.firebaseio.com/v0/beststories.json?print=pretty')->json();
        
       for ($i =0; $i < 2; $i++){
        $story1[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1[$i].'.json?print=pretty')['title'];
        $story11[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1[$i].'.json?print=pretty')['id'];
       }
    for ($i =0; $i < 2; $i++){
        $story2[] =Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data2[$i].'.json?print=pretty')['title'];
        $story22[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data2[$i].'.json?print=pretty')['id'];
       }
       for ($i =0; $i < 2; $i++){
        $story3[] =Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data3[$i].'.json?print=pretty')['title'];
        $story33[] =Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data3[$i].'.json?print=pretty')['id'];
       }
       return view('navigation',['story1'=>$story1,'story11'=>$story11,'story2'=>$story2,'story22'=>$story22,'story3'=>$story3,'story33'=>$story33]);
    }



    public function list2()
    {
        $data1 = Http::get('https://hacker-news.firebaseio.com/v0/topstories.json?print=pretty')->json();
       for ($i =0; $i < 10; $i++){
        $story1[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1[$i].'.json?print=pretty')['title'];
        $story11[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1[$i].'.json?print=pretty')['id'];
       }
       return view('top',['story1'=>$story1,'story11'=>$story11]);
    }
    public function list3()
    {
        $data1 = Http::get('https://hacker-news.firebaseio.com/v0/newstories.json?print=pretty')->json();
         for ($i =0; $i < 10; $i++){
        $story1[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1[$i].'.json?print=pretty')['title'];
        $story11[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1[$i].'.json?print=pretty')['id'];
       }
       return view('new',['story1'=>$story1,'story11'=>$story11]);
    }
    public function list4()
    {
        $data1 = Http::get('https://hacker-news.firebaseio.com/v0/beststories.json?print=pretty')->json();
       for ($i =0; $i < 10; $i++){
        $story1[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1[$i].'.json?print=pretty')['title'];
        $story11[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1[$i].'.json?print=pretty')['id'];
       }
       return view('best',['story1'=>$story1,'story11'=>$story11]);
    }
    public function view($data1)
    {
        $title=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1.'.json?print=pretty')['title'];
        $by=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1.'.json?print=pretty')['by'];
        $url=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1.'.json?print=pretty')['url'];
        $kids=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1.'.json?print=pretty')['kids'];
        $count_kids=count($kids);
        for ($i =0; $i < $count_kids; $i++){
        $story1[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$kids[$i].'.json?print=pretty')['text'];
        $story11[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$kids[$i].'.json?print=pretty')['id'];
       }
       return view('view',['title'=>$title,'by'=>$by,'url'=>$url,'story1'=>$story1,'story11'=>$story11]);
    }
     public function viewc($data1)
    {
        $title=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1.'.json?print=pretty')['text'];
        $by=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1.'.json?print=pretty')['by'];
        $kids=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$data1.'.json?print=pretty')['kids'];
        for ($i =0; $i < 10; $i++){
        $story1[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$kids[$i].'.json?print=pretty')['text'];
        $story11[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$kids[$i].'.json?print=pretty')['id'];
       }
       return view('viewc',['title'=>$title,'by'=>$by,'story1'=>$story1,'story11'=>$story11]);
    }



   public function addhackernews(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'by' => 'required|unique:hackernews' ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            //$hackernews = new hackernews();
           // $hackernews->by=$request->by;
            //$hackernews->title=$request->comment2;
            //$query=$hackernews->save();
            if(!query){
                return response()->json(['code'=>0,'msg'=>'something went wrong']);
            }else{
                return response()->json(['code'=>1,'msg'=>'something went right']);
            }
        }
    }
    public function index(Request $request)
    {
    	return view('welcome');
    }
    
}