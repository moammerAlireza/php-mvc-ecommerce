<div class="small-12 column">
    @foreach ($featuredProducts as $product)
        <a href="/product/{{$product->id}}">
            <div class="card" data-equalizer-watch>
                <div class="card-section">
                <img src="/{{$product->image_path}}" width="100%" height="200">
                </div>
                <div class="card-section">
                <p>
                    {{$product->name}}
                </p>
                <a href="/product/{{$product->id}}" class="button more expanded">
                    See More
                </a>
                <a href="/product/{{$product->id}}" class="button cart expanded">
                    {{$product->price}} - Add to cart
                </a>
                </div>
            </div>
        </a>
    @endforeach
</div>