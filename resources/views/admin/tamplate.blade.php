<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png"  href="{{asset('image/icon.png')}}"  >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        <div class="relative">
            @include('admin.layout.sidebar')
        </div>

        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            @include('admin.layout.header')

            <div class="max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                @yield('content')
            </div>
        </div>
    
    </div>


    {{-- @include('admin.layout.footer') --}}
</body>
</html>