@include('Components.head')
<div id="main-wrapper" class="show">
@include('Components.header')
@if(auth()->user()->role == 'master')
    @include('Components.sidebar')

@else 

    @include('Components.clubsidebar')
@endif

@yield('content')
@include('Components.footer')