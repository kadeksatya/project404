<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config("app.name")}} | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('asset/plugin/materialize/css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/material.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    

</head>
<body>
    
    <section>
        @yield('content')
    </section>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{asset('asset/plugin/materialize/js/materialize.min.js')}}"></script>

<script>


  
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
   
  });

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery



    $(document).ready(function(){
    $('.sidenav').sidenav();
    });
    $(document).ready(function(){
    $('.modal').modal();
     });
     $(document).ready(function(){
    $('select').formSelect();
     });
    </script>
</body>
</html>