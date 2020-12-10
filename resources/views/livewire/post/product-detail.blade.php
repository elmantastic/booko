<div class="section-post mt-5">
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
                    src="{{ asset('assets/images/products')}}/{{$product->image}}"
                    alt="product">
            </div>
        </div>
        <div class="col-md-6">
            @if($product->stock > 10)
                <span class="badge badge-secondary badge-stock">Ready Stock</span>
            @elseif($product->stock > 0)
                <span class="badge badge-secondary badge-stock-limit">Run Out Soon</span>
            @else
                <span class="badge badge-secondary badge-stock-out">Out Of Stock</span>
            @endif
            <h3 class="font-weight-bold text-booko-primary">{{$product->title}}</h3>
            <h6 class="font-weight-normal">{{$product->author}}</h6>
            <hr>
            <div class="row">
                <div class="col-3">
                    <h6 class="font-weight-bold text-secondary">Harga</h6>
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
                    <h6 class="font-weight-bold text-secondary">Jumlah</h6>
                </div>
                <div class="col-md-auto">
                    <h3 class="font-weight-bold text-booko-secondary">Rp {{$product->price}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
