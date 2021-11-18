<?php

namespace App\Http\Controllers;
ini_set('max_execution_time', 600);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use  Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use app\Models\hackernews;
use app\Models\top;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use DB;


class HackerController extends Controller
{
    //

     public function list()
    {
        
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
    public function save(Request $request){
       $tops = Http::get('https://hacker-news.firebaseio.com/v0/topstories.json?print=pretty')->json();
        $data1=array($tops);
      DB::table('top')->insert($data1);
      $top = json_decode( json_encode($tops), true);
     for ($i =0; $i < 10; $i++){
        $topid[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$top[$i].'.json?print=pretty')['id'];
        $toptitle[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$top[$i].'.json?print=pretty')['title'];
     // DB::table('topby')->insert($topby);
      }

        $news = Http::get('https://hacker-news.firebaseio.com/v0/newstories.json?print=pretty')->json();
        $data2=array($news);
        DB::table('new')->insert($data2);
        $new = json_decode( json_encode($news), true);
        for ($i =0; $i < 30; $i++){
       $newby[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$new[$i].'.json?print=pretty')['by'];
       $newdescendants[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$new[$i].'.json?print=pretty')['descendants'];
      $newid[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$new[$i].'.json?print=pretty')['id'];
       $newscore[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$new[$i].'.json?print=pretty')['score'];
      $newtime[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$new[$i].'.json?print=pretty')['time'];
      $newtitle[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$new[$i].'.json?print=pretty')['title'];
       $newtype[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$new[$i].'.json?print=pretty')['type'];
       //$newurl[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$new[$i].'.json?print=pretty')['url'];
        DB::table('newby')->insert($newby);
     DB::table('newdescendants')->insert($newdescendants);
     DB::table('newid')->insert($newid);
     DB::table('newscore')->insert($newscore);
     DB::table('newtime')->insert($newtime);
     DB::table('newtitle')->insert($newtitle);
     DB::table('newtype')->insert($newtype);
     //DB::table('newurl')->insert($newurl);
      }


      $bests = Http::get('https://hacker-news.firebaseio.com/v0/beststories.json?print=pretty')->json();
      $data3=array($bests);
     DB::table('best')->insert($data3);
     $best = json_decode( json_encode($bests), true);
      for ($i =0; $i < 30; $i++){
    $bestby[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$best[$i].'.json?print=pretty')['by'];
    $bestdescendants[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$best[$i].'.json?print=pretty')['descendants'];
      $bestid[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$best[$i].'.json?print=pretty')['id'];
     $bestscore[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$best[$i].'.json?print=pretty')['score'];
        $besttime[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$best[$i].'.json?print=pretty')['time'];
        $besttitle[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$best[$i].'.json?print=pretty')['title'];
      $besttype[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$best[$i].'.json?print=pretty')['type'];
      //$besturl[$i]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$best[$i].'.json?print=pretty')['url'];
     DB::table('bestby')->insert($bestby);
       DB::table('bestdescendants')->insert($bestdescendants);
      DB::table('bestid')->insert($bestid);  
      DB::table('bestscore')->insert($bestscore);  
      DB::table('besttime')->insert($besttime);  
     DB::table('besttitle')->insert($besttitle);
     DB::table('besttype')->insert($besttype); 
      //DB::table('besturl')->insert($besturl);   
   }
   for ($i =0; $i < 2; $i++){
        $story1[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$top[$i].'.json?print=pretty')['title'];
        $story11[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$top[$i].'.json?print=pretty')['id'];
       }
    for ($i =0; $i < 2; $i++){
        $story2[] =Http::get('https://hacker-news.firebaseio.com/v0/item/'.$new[$i].'.json?print=pretty')['title'];
        $story22[]=Http::get('https://hacker-news.firebaseio.com/v0/item/'.$new[$i].'.json?print=pretty')['id'];
       }
       for ($i =0; $i < 2; $i++){
        $story3[] =Http::get('https://hacker-news.firebaseio.com/v0/item/'.$best[$i].'.json?print=pretty')['title'];
        $story33[] =Http::get('https://hacker-news.firebaseio.com/v0/item/'.$best[$i].'.json?print=pretty')['id'];
       }
       return view('navigation',['story1'=>$story1,'story11'=>$story11,'story2'=>$story2,'story22'=>$story22,'story3'=>$story3,'story33'=>$story33]);
        }
}