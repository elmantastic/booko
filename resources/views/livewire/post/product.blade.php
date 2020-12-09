<div class="mt-5">
    <div class="row section-post">
        <div class="col p-0">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/')}}" class="font-weight-normal" >Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products List</li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-5 section-post">
        <div class="section-title">
            <h4>List product</h4>
        </div>
        <div>
            <div class="input-group">
            <input wire:model="search" type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
            </div>
            </div>
        </div>
    </div>
    <div class="products-center">
        @foreach($products as $product)
        <div class="card border-0 product-custom">
            <article class="product">
                <a href="#">
                <div class="img-container">
                    <img 
                    class="product-img" 
                    src="{{ asset('assets/images/products')}}/{{$product->image}}"
                    alt="product">
                    </div>
                <h4 class="pt-2 pl-2">{{$product->title}}</h4>
                <p class="pl-2">{{$product->author}}</p>
                <h5 class="p-2">Rp {{number_format($product->price , 0, ',', '.')}}</h5>
                </a>
            </article>
        </div>
        @endforeach
    </div>
    <div class="container-sm mt-5 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>

{{-- asset('storage/images/'.$product->image)--}}