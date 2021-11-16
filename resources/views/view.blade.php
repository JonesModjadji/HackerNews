<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hacker News/stories</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>
  <!-- Fixed navbar -->
<div class=" navbar-default navbar-fixed-top">
    <div class="container" style="width:100%;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-controls="navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <a class="navbar-brand"  href="/hackernews">Hacker News</a>
        </div>
        <div class="navbar-collapse collapse">
            <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'view')">view</button>
</div>
        </div>
    </div>
</div>
<!-- Fixed navbar -->

    <!-- Tab content -->
<div id="view" class="tabcontent" style="display: block;">
  <h2>View Story</h2>
   <hr style="text-align:left;margin-left:0">
   <p>By - {{$by}}</p>
<h1>{{$title}}</h1>
<a href='{{$url}}'>{{$url}}</a>
<br>
   @foreach(array_combine($story1, $story11) as $data => $data1)
<button id="button" onclick="location.href='{{ url('viewc/'.$data1.'') }}'"><h4>{{$data}}</h4></button>
<hr style="text-align:left;margin-left:0">
  @endforeach
</div>
  </div>
</body>
  <script src="{{asset('/jquery/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('/datatable/js/dataTables.bootsrap4.min.js')}}"></script>
  <script src="{{asset('/sweetalert2/sweetalert2.min.js')}}"></script>
  <script src="{{asset('/toastr/toastr.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="{{asset('/js/app.js')}}"></script>
  
</html>