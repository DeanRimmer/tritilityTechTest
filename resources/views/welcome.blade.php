<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tritility Test CRM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-left">
                <a href="{{ URL::to('/') }}"><img src="../images/tritility.png"></a>
            </div>
            <div class="top-right links">
                <p>Welcome, {{ Auth::user()->email }} </p>
                <a href="{{ url('/login/logout') }}">Logout</a>
            </div>

            <div class="content">
                <div class="title m-b-md">
                    Please select a view
                </div>

                <div class="links">
                    <a href="{{ url('/company') }}">Company</a>
                    <a href="{{ url('/employee') }}">Employee</a>
                </div>
            </div>
        </div>
    </body>
</html>
