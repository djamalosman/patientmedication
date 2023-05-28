<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>@yield('title')</title>
    @stack('before-style')
    @include('include.style')
    @stack('after-style')

</head>

<body>
    <div id="app">
        <div id="main">
            @include('include.sidebarmenu')

            @yield('content')
            
            @include('include.footer')
        </div>
    </div>
        @stack('before-script')
        @include('include.script')
        @stack('after-script')

</body>

</html>
