<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', $title ?? '') - {{ config('dz.name') }} </title>

    <meta name="description" content="@yield('page_description', $title ?? '')"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">


    @if(!empty(config('dz.public.pagelevel.css.'.$action)))
        @foreach(config('dz.public.pagelevel.css.'.$action) as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach
    @endif

    @if(!empty(config('dz.public.global.css')))
        @foreach(config('dz.public.global.css') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach
    @endif
    <link rel="stylesheet" href="{{asset('vendor/sweetalert2/sweetalert2.css')}}">

</head>

<body>

<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<div id="main-wrapper">
    <div class="nav-header">
        <a href="{!! url('/index'); !!}" class="brand-logo">
            <img class="logo-abbr" src="{{ asset('images/logo.png') }}" alt="">
            <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="">
            <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt="">
        </a>
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    @include('elements.header')

    @include('elements.sidebar')
    <div class="content-body">
        @yield('content')
    </div>
    @include('elements.footer')

</div>
@include('elements.footer-scripts')
<script type="text/javascript" src="{{asset('vendor/sweetalert2/sweetalert2.js')}}"></script>
@include('layout.sweetalert-messages')
</body>
</html>
