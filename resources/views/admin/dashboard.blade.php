
@extends('admin.layout.base')

@section('title','Dashboard')

@section('content')
    <div class="dashboard">
        <div class="row expanded">
            <h2>Dashboard</h2>
           {!!\App\classes\CSRFToken::_token()!!}
           <br>
           {!! \App\classes\session::get('token')!!}
          
        </div>
    </div>
@endsection




