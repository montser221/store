<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title','Default')</title>
        @yield('styles')
    </head>
    <body>
        @yield('header')
        
        @yield('content')
        
        @yield('scripts')

        @yield('footer')
    </body>
</html>
