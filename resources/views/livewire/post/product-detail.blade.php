<div class="section-post mt-5">
    <div class="row">
        <div class="col">
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif
        </div>
    </div>

    <div class="col p-0">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/')}}" class="font-weight-normal" >Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/products')}}" class="font-weight-normal" >Products List</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card-body p-0">
                <img 
                    class="img-fluid product-image-booko" 
                    src="{{ asset('storage/images/products')}}/{{$product->image}}"
                    alt="product">
            </div>
        </div>
        <form wire:submit.prevent="addToCart" class="col-md-6 position-relative">
            @if($product->stock > 10)
                <span class="badge badge-secondary badge-stock"><i class="fas fa-check"></i> Ready Stock</span>
            @elseif($product->stock > 0)
                <span class="badge badge-secondary badge-stock-limit"><i class="fas fa-stopwatch"></i> Run Out Soon</span>
            @else
                <span class="badge badge-secondary badge-stock-out"><i class="fas fa-times"></i> Out Of Stock</span>
            @endif
            <h3 class="font-weight-bold text-booko-primary">{{$product->title}}</h3>
            <h6 class="font-weight-normal">{{$product->author}}</h6>
            <hr>
            <div class="row">
                <div class="col-3">
                    <h6 class="font-weight-bold text-secondary">Price</h6>
                </div>
                <div class="col-md-auto">
                    <h3 class="font-weight-bold text-booko-secondary">Rp {{$product->price}}</h3>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <h6 class="font-weight-bold text-secondary">Stock</h6>
                </div>
                <div class="col-md-auto">
                    <h3 class="font-weight-bold text-booko-primary">{{$product->stock}} </h3>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <h6 class="font-weight-bold text-secondary">Qty</h6>
                </div>
                <div class="col-md-auto d-flex justify-content-around align-self-center">
                    @if($qty == 1)
                    <button wire:click="decrementQty" class="btn-qty-booko btn-qty-limit bg-secondary disabled ml-0" type="button" disabled>
                    @else
                    <button wire:click="decrementQty" class="btn-qty-booko btn-success ml-0" type="button">
                    @endif
                    <i class="fas fa-minus"></i> </button>
                    <h4 class="pt-1">{{$qty}}</h4>
                    @if($qty < $product->stock)
                    <button wire:click="incrementQty" class="btn-qty-booko btn-success" type="button" autofocus>
                    @else
                    <button wire:click="incrementQty" class="btn-qty-booko btn-qty-limit disabled bg-secondary" type="button" disabled>
                    @endif
                    <i class="fas fa-plus"></i> </button>
                </button>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-block btn-success position-absolute fixed-bottom" type="submit" @if($product->stock < 1) disabled @endif><i class="fas fa-shopping-cart"></i> Add to cart</button>
            </div>
        </form>
    </div>
    <div class="row mt-5 pl-3">
        <ul class="nav nav-tabs w-100 justify-content-center" id="myTab" role="tablist">
            <li class="nav-item col-sm-3 pr-0" role="presentation">
                <a class="nav-link active text-center" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item col-sm-3 pl-0" role="presentation">
                <a class="nav-link text-center" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Detail</a>
            </li>
        </ul>
    </div>
    <div class="row mt-3 pl-3">
        <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">{{$product->description}}</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-2">Category</div>
                    <div class="col">: {{$product->category->name}}</div>
                </div>
                <div class="row">
                    <div class="col-2">Author</div>
                    <div class="col">: {{$product->author}}</div>
                </div>
                <div class="row">
                    <div class="col-2">Publisher</div>
                    <div class="col">: {{$product->publisher}}</div>
                </div>
                <div class="row">
                    <div class="col-2">Year</div>
                    <div class="col">: {{$product->year}}</div>
                </div>
                <div class="row">
                    <div class="col-2">Pages</div>
                    <div class="col">: {{$product->pages}}</div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
