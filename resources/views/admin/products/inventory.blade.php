
@extends('admin.layout.base')

@section('title','Manage Inventory')
@section('data-page-id','adminProduct')

@section('content')
    <div class="products">
        <div class="row expanded">
            <div class="column medium-11"><h2 style="font-size: 1.5rem;font-weight:500px;padding-left: 40px">
                Manage Inventory Items</h2> <hr></div>
        </div>

       @include('includes.message')
        

        <div class="row expanded">
          <div class="small-12 medium-11 column">
            <a href="/admin/product/create" class="button float-right">
                <i class="fa fa-plus"></i>Add New Product
            </a>
          </div>
            
        </div>

        <div class="row expanded">
            <div class="small-12 medium-11 column" style="margin-right: 10%; margin-left: 10%" >
                @if(count($products))
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr><th>Image</th><th>Name</th><th>Price</th>
                            <th>Quantity</th><th>Category</th><th>Subcategory</th>
                            <th>Date Created</th><th width="70">Action</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product )
                                <tr>
                                    <td>
                                        <img src="/{{$product['image_path']}}" alt="{{$product['name']}}" height="40px" width="40px">
                                    </td>
                                    <td>{{$product['name']}}</td>
                                    <td>{{$product['price']}}</td>
                                    <td>{{$product['quantity']}}</td>
                                    <td>{{$product['category_name']}}</td>
                                    <td>{{$product['sub_category_name']}}</td>
                                    <td>{{$product['added']}}</td>
                                    <td width="50" class="text-right">


                                        <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false"
                                                tabindex="1" title="Edit Products">
                                            <a href="/admin/product/{{$product['id']}}/edit">
                                                Edit <i class="fa fa-edit" ></i></a>
                                        </span>

                        
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>

                    {!! $links !!}
                @else
                    <h3>You have not created any products</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
