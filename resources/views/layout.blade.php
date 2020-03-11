
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
  </head>

  <body>

  @include('layouts.nav')
@if($flash =session('message'))
<div class="alert alert-success" role="alert">
  {{$flash}}
 </div>
@endif
    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
      </div>
    </div>

    <div class="container">

      <div class="row">

   @yield ('content')
   @include('layouts.sidebar')

      </div>

    </div>

    @include('layouts.footer')
    <script src="{{asset('js/jquery-3.1.1.slim.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/tether.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
  </body>
  <script>
  $(document).ready(function() {
  $(".alert").delay(1000).slideUp(200, function() {
      $(this).alert('close');
  });
    });
  </script>
  <script>
   $(".depost").click(function (e) {
     var check = confirm("are you sure that you want to edit this post");
     if(!check){
        e.preventDefault();
     }
   });

  </script>

<script>
 $(".depost3").click(function (e) {
   var check = confirm("are you sure that you want to edit this post");
   if(!check){
      e.preventDefault();
   }
 });

</script>


</html>
