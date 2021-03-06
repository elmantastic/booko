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
            <h4>{{$title}}</h4>
        </div>
        <div>
            <div class="input-group input-group-booko">
            <input wire:model="search" type="text" class="input-search-booko form-control " placeholder="Search..." aria-label="Search" aria-describedby="basic-addon1">
            <span class="input-group-text bg-transparent-booko btn-search-booko border-0" id="basic-addon1"><i class="fa fa-search"></i></span>
            </div>
        </div>
    </div>
    @if(count($products)== 0)
        <div class="container text-center pt-5">
        <h2>SORRY, WE DON'T HAVE THE BOOK YET</h2>
        </div>
        @else
        <div class="products-center">
            @foreach($products as $product)
            
            <div class="card border-0 product-custom">
                <article class="product">
                    <a href="{{ url('products', $product->id)}}">
                    <div class="img-container">
                        <img 
                        class="product-img" 
                        src="{{ asset('storage/images/products')}}/{{$product->image}}"
                        alt="product">
                        </div>
                    <h4 class="pt-2 pl-2">{{$product->title}}</h4>
                    <p class="pl-2">{{$product->author}}</p>
                    <h5 class="p-2">Rp {{number_format($product->price , 0, ',', '.')}}</h5>
                    @if($product->stock > 10)
                    <span class="badge badge-secondary badge-stock ml-2"><i class="fas fa-check"></i> Ready Stock</span>
                @elseif($product->stock > 0)
                    <span class="badge badge-secondary badge-stock-limit ml-2"><i class="fas fa-stopwatch"></i> Run Out Soon</span>
                @else
                    <span class="badge badge-secondary badge-stock-out ml-2"><i class="fas fa-times"></i> Out Of Stock</span>
                @endif
                    </a>
                </article>
            </div>
            @endforeach
        </div>
    @endif
    <div class="container-sm mt-5 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>
