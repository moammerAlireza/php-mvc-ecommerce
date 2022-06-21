
@extends('admin.layout.base')

@section('title','Product Categories')

@section('content')
    <div class="category">
        <div class="row expanded">
            <h2>Product Categories</h2>
        </div>

       @include('includes.message')
        

        <div class="row expanded">
            <div class="small-12 medium-6 column" style="margin-right: 10%; margin-left: 10%">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" placeholder="Search by Name">
                       
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Search">
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="small-12 medium-5 end column"  style="margin-right: 10%; margin-left: 10%">
                <form action="/admin/product/categories" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" name="name" placeholder="Caregory Name">
                        <input type="hidden" name="token" value="{{\App\classes\CSRFToken::_token()}}">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Create">
                        </div>
                    </div>
                </form>
            </div>
            
        </div>

        <div class="row expanded">
            <div class="small-12 medium-11 column" style="margin-right: 10%; margin-left: 10%" >
                @if(count($categories))
                    <table class="hover">
                        <tbody>
                            @foreach ($categories as $category )
                                <tr>
                                    <td>{{$category['name']}}</td>
                                    <td>{{$category['slug']}}</td>
                                    <td>{{$category['added']}}</td>
                                    <td width="100" class="text-right">
                                        <a data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                        
                                        <!-- Edit category model-->
                                        <div class="reveal" id="item-{{$category['id']}}" 
                                        data-reveal data-close-on-click="false" data-close-on-esc="false">
                                            <h1>Edit Category</h1>
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" name="name" value="{{$category['name']}}">
                                                    <input type="hidden" name="token" value="{{\App\classes\CSRFToken::_token()}}">
                                                    <div class="input-group-button">
                                                        <input type="submit" class="button update-category" id="{{$category['id']}}" value="Update">
                                                    </div>
                                                </div>
                                            </form>
                                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>

                    {!! $links !!}
                @else
                    <h3>You have not created any category</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
