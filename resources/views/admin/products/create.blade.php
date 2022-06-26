
@extends('admin.layout.base')

@section('title','Create Product')
@section('data-page-id','adminProduct')

@section('content')
    <div class="add-product">
        <div class="row expanded">
            <div class="column medium-11"><h2 style="font-size: 1.5rem;font-weight:500px;padding-left: 40px">
                Add Iventory Item</h2> <hr></div>
        </div>

       @include('includes.message')
       
       <form method="POST" action="\admin\product\create">
            <div class="small-12 medium-11" style="padding: 25px">
                <div class="row expanded">
                    <div class="small-12 medium-6 column">
                        <label>Product Name:
                            <input type="text" name="name" placeholder="Product Name"
                            value="{{\App\classes\Request::old('post','name')}}">
                        </label>
                    </div>

                    <div class="small-12 medium-6 column">
                        <label>Product Price:
                            <input type="text" name="Price" placeholder="Product Price"
                            value="{{\App\classes\Request::old('post','Price')}}">
                        </label>
                    </div>

                    <div class="small-12 medium-6 column">
                        <label>Product Category:
                            <select name="category" id="product-category">
                                <option value="{{\App\classes\Request::old('post','category') ? : ""}}">
                                    {{\App\classes\Request::old('post','category') ? : "Select Category"}}
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            
                        </label>
                    </div>

                    <div class="small-12 medium-6 column">
                        <label>Product Subcategory:
                            <input type="text" name="Price" placeholder="Product Price"
                            value="{{\App\classes\Request::old('post','Price')}}">
                        </label>
                    </div>

                </div>
            </div>
       </form>

    </div>    
    @include('includes.delete-modal')
@endsection
