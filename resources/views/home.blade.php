@extends('layouts.app')

@section('title', 'Homepage')
@section('data_page_id', 'home')

@section('content')  
    <div class="home">
        @include('layouts.slider')

        <section class="display-products" data-token="{{$token}}" id="root">
           <div class="row medium-up-4">
                <h2>Featured Products</h2>
                @include('layouts.featured-post')
           </div>


           <div class="row medium-up-4">
            <h2>Products picks</h2>
       </div>
       <div class="text-center">
            <i v-show="loading" class="fa fa-spinner fa-spin" style="font-size: 3rem ;padding-bottom: 3rem; position: fixed;top:60%;bottom: 20%;color: #0a2b1d;" ></i>
       </div>
        </section>
    </div>
@endsection