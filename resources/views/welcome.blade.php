<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


    </head>
    <body>
            <div id="app">
            <router-view></router-view>

            <br>
            <hr>
            <router-link to="/">Home</router-link>
            <router-link to="/about">About</router-link>
            
            </div>
            <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
