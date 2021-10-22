<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout._header')
        @yield('styles')
    </head>
    <body>
    	<div class="container-fluid">
    		@yield('content')
    	</div>

        @yield('scripts')
        @include('layout._script')
    </body>
</html>
