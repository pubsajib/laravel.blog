<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    <body>
        @include('partials._navigation')
        <div class="container">
            {{-- {{ Auth::check() ? 'Logged In' : 'Logged Out' }} --}}
            @include('partials._message')
            @yield('content')
            @include('partials._footer')
        </div>
        @include('partials._javascript')
        @yield('scripts')
    </body>
</html>
