@include('Components.head')
<div id="main-wrapper" class="show">
@include('Components.header')
@include('Components.sidebar')
@yield('content')
@include('Components.footer')