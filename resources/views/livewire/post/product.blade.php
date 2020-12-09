<div class="products-center">
    @foreach($products as $product)
    <div class="card">
        <article class="product">
            <a href="#">
            <div class="img-container">
                <img 
                class="product-img" 
                src="{{ asset('assets/images/products')}}/{{$product->image}}"
                alt="product">
                </div>
            <h4 class="p-2">{{$product->title}}</h4>
            <h5>Rp {{number_format($product->price , 0, ',', '.')}}</h5>
            </a>
        </article>
    </div>
    @endforeach
</div>


{{-- asset('storage/images/'.$product->image)--}}