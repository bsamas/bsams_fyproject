

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  <title>{{ config('app.name', 'Laravel') }}</title>  --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .card-header
        {
            text-align: center;
            background-color: rgb(201, 211, 211);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: white;

        }

        .container
        {
            width: 60%;
           padding-top: 8%;
           
           
        }

        .card-body{
            background-color:rgb(226, 235, 235)
        }

        .form-group, label
        {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;    
            font-weight: 300
        }
        
        body{
            {{--  background-color: rgb(184, 211, 211)  --}}
                background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("{{asset('images/block.png')}}");
                background-size: cover;
        }
       
    </style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
