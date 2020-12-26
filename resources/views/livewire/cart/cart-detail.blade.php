<div class="section-post mt-5">
    <div class="col p-0">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/')}}" class="font-weight-normal" >Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col">
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>
    @if(empty($orderDetail))
    <div class="mt-5 text-center">
        <h2 class="text-booko-primary font-weight-bold">Your Cart Is Empty</h2>
        <h6>You haven't add a product</h6>

        <button class="btn btn-success btn-link-booko  mt-5"><a href="{{url('/products')}}" class="text-white">Find Book</a></button>
    </div>
    @else
    <div class="row">
        <div class="col-md-7 pr-0">
            @foreach($orderDetail as $detail)
                <div class="row mt-4">
                    <div class="col-1 d-flex align-items-center checkbox-booko-set">
                        <input type="checkbox" class="form-check-input ml-0 checkbox-booko" id="exampleCheck1">
                    </div>
                    <div class="col-2 d-flex align-items-center p-0">
                        <img 
                            class="img-fluid image-cart-booko ml-2" 
                            src="{{ asset('storage/images/products')}}/{{$detail->product->image}}"
                            alt="product">
                    </div>
                    <div class="col-8 position-relative ml-4">
                        <a href="{{url('/products', $detail->product->id)}}" class="cart-link-title">{{$detail->product->title}}</a>
                        <p class="text-secondary">{{$detail->product->author}}</p>
                        <h5 class="text-booko-primary font-weight-bold">{{$detail->product->price}}</h5>
                        <div class="position-absolute bottom-0 cart-count-order">
                            <div class="col-md-auto d-flex justify-content-around align-self-center">
                            <button wire:click="destroy({{$detail->id}})" class="btn-qty-booko bg-dark" type="button"><i class="fas fa-trash"></i></button>
                            @if($detail->qty == 1)
                            <button wire:click="decrementQty({{$detail->id}})" class="btn-qty-booko btn-qty-limit bg-secondary disabled ml-0" type="button" disabled>
                            @else
                            <button wire:click="decrementQty({{$detail->id}})" class="btn-qty-booko btn-success ml-0" type="button">
                            @endif
                            <i class="fas fa-minus"></i> </button>
                            <h4 class="pt-1">{{$detail->qty}}</h4>
                            @if($detail->qty < $detail->product->stock)
                            <button wire:click="incrementQty({{$detail->id}})" class="btn-qty-booko btn-success" type="button">
                            @else
                            <button wire:click="incrementQty({{$detail->id}})" class="btn-qty-booko btn-qty-limit disabled bg-secondary" type="button" disabled>
                            @endif
                            <i class="fas fa-plus"></i> </button>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
            @endforeach
        </div>
        @endif
        @if(!empty($order))
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="row pl-3">
                        <div class="text-booko-primary cart-link-title">Summary</div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mt-5">
                        <h6 class="text-booko-primary">Total price</h6>
                        <h6 class="text-booko-secondary cart-link-title">Rp {{number_format($order->price_total , 0, ',', '.')}}</h6>
                    </div>
                    <a class="btn btn-block btn-success font-weight-bold mt-4 text-white" href="{{url('/checkout')}}">Checkout ( {{$order->qty_products}} )</a>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="mt-5"></div>
</div>
