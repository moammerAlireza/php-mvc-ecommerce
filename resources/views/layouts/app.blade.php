@extends('layouts.base')

@section('body')
   
    <!-- navigation-->
    @include('includes.nav')

    <!-- site wrapper-->
    <div class="site_wrapper">
        @yield('content')
    </div>

    @yield('footer')
@endsection