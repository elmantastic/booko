<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <!-- List Transaction -->
    <div class="container-fluid d-flex justify-content-center p-1 align-self-center mb-3">
        <ul class="nav nav-pills p-1" id="pills-tab" role="tablist">
        <li class="nav-item mr-2 status-booko">
            <a class="nav-link active border border-primary" id="pills-home-tab" data-toggle="pill" href="#pills-confirmation" role="tab" aria-controls="pills-confirmation" aria-selected="true">Waiting for confirmation</a>
        </li>
        <li class="nav-item mr-2 status-booko">
            <a class="nav-link border border-primary" id="pills-profile-tab" data-toggle="pill" href="#pills-process" role="tab" aria-controls="pills-process" aria-selected="false">Process</a>
        </li>
        <li class="nav-item mr-2 status-booko">
            <a class="nav-link border border-primary" id="pills-contact-tab" data-toggle="pill" href="#pills-being-sent" role="tab" aria-controls="pills-being-sent" aria-selected="false">Being sent</a>
        </li>
        <li class="nav-item mr-2 status-booko">
            <a class="nav-link border border-primary" id="pills-contact-tab" data-toggle="pill" href="#pills-delivered" role="tab" aria-controls="pills-delivered" aria-selected="false">Delivered</a>
        </li>
        <li class="nav-item mr-2 status-booko">
            <a class="nav-link border border-primary" id="pills-contact-tab" data-toggle="pill" href="#pills-finished" role="tab" aria-controls="pills-finished" aria-selected="false">Finished</a>
        </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-confirmation" role="tabpanel" aria-labelledby="pills-home-tab">

    <!-- Waiting for Confirmation -->

        @if($countTransaction == 0)
            <div class="row justify-content-center mt-5">
                <h3 class="text-booko-primary">There is no transaction yet</h3>
            </div>

        @else
            @foreach($transactionList as $transaction)
            @if($transaction->status->id == 1)
            <div class="card status-booko-list mb-4 shadow card-booko-transaction">
                <div class="card-body p-0">
                    <div class="row pl-3 pr-3">
                        <div class="col d-flex justify-content-between bg-dark text-white">
                        <p class="m-2">{{$transaction->created_at}}</p>
                        <p class="m-2">{{$transaction->order->qty_products}} products</p>
                        </div>
                    </div>
                    <hr class="m-0 mb-3">
                    <div class="row pl-3 pr-3">
                        <div class="col-6">
                        <h6 class="font-weight-bold">Shipping Address</h6>
                        <p>{{$transaction->shipping_address}}</p>
                        </div>
                        <div class="col-3">
                        <p>Status</p>
                        <h6 class="font-weight-bold">{{$transaction->status->name}}</h6>
                        </div>
                        <div class="col-3">
                        <p>Total Pay</p>
                        <h5 class="font-weight-bold text-booko-secondary">Rp {{number_format($transaction->order->price_total + $transaction->order->unique_code , 0, ',', '.')}}</h5>
                        </div>
                    </div>
                    <hr class="m-0 mb-3">
                    <div class="row pl-3 pr-3 mb-3">
                        <div class="col mt-3">
                        <div class="container-fluid">
                            @foreach($detailTransaction as $key => $list)
                                @if($key == $transaction->order->id)
                                    @foreach($list as $detail)
                                        <div class="row mb-2">
                                            <div class="col-1">
                                            <img src="{{ asset('storage/images/products')}}/{{$detail->product->image}}" alt="" height="100" width="70">
                                            </div>
                                            <div class="col-4">
                                            <h6 class="text-booko-primary font-weight-bold pl-3">{{$detail->product->title}}</h6>
                                            <p class="text-gray pl-3">{{$detail->product->author}}</p>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Price</p>
                                            <h6 class="text-booko-secondary font-weight-bold">Rp {{$detail->product->price}}</h6>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Qty</p>
                                            <h6 class="text-booko-secondary font-weight-bold">{{$detail->qty}}</h6>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Sub Total</p>
                                            <h6 class="text-booko-secondary font-weight-bold">{{$detail->subtotal_price}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        @endif
    </div>
    <div class="tab-pane fade" id="pills-process" role="tabpanel" aria-labelledby="pills-process">

    <!-- In Process -->
    
    @if($countTransaction == 0)
            <div class="row justify-content-center mt-5">
                <h3 class="text-booko-primary">There is no transaction yet</h3>
            </div>

        @else
            @foreach($transactionList as $transaction)
            @if($transaction->status->id == 2)
            <div class="card status-booko-list mb-4 shadow card-booko-transaction">
                <div class="card-body p-0">
                    <div class="row pl-3 pr-3">
                        <div class="col d-flex justify-content-between bg-dark text-white">
                        <p class="m-2">{{$transaction->created_at}}</p>
                        <p class="m-2">{{$transaction->order->qty_products}} products</p>
                        </div>
                    </div>
                    <hr class="m-0 mb-3">
                    <div class="row pl-3 pr-3">
                        <div class="col-6">
                        <h6 class="font-weight-bold">Shipping Address</h6>
                        <p>{{$transaction->shipping_address}}</p>
                        </div>
                        <div class="col-3">
                        <p>Status</p>
                        <h6 class="font-weight-bold">{{$transaction->status->name}}</h6>
                        </div>
                        <div class="col-3">
                        <p>Total Pay</p>
                        <h5 class="font-weight-bold text-booko-secondary">Rp {{number_format($transaction->order->price_total + $transaction->order->unique_code , 0, ',', '.')}}</h5>
                        </div>
                    </div>
                    <hr class="m-0 mb-3">
                    <div class="row pl-3 pr-3 mb-3">
                        <div class="col mt-3">
                        <div class="container-fluid">
                            @foreach($detailTransaction as $key => $list)
                                @if($key == $transaction->order->id)
                                    @foreach($list as $detail)
                                        <div class="row mb-2">
                                            <div class="col-1">
                                            <img src="{{ asset('storage/images/products')}}/{{$detail->product->image}}" alt="" height="100" width="70">
                                            </div>
                                            <div class="col-4">
                                            <h6 class="text-booko-primary font-weight-bold pl-3">{{$detail->product->title}}</h6>
                                            <p class="text-gray pl-3">{{$detail->product->author}}</p>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Price</p>
                                            <h6 class="text-booko-secondary font-weight-bold">Rp {{$detail->product->price}}</h6>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Qty</p>
                                            <h6 class="text-booko-secondary font-weight-bold">{{$detail->qty}}</h6>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Sub Total</p>
                                            <h6 class="text-booko-secondary font-weight-bold">{{$detail->subtotal_price}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        @endif
    
    </div>
    <div class="tab-pane fade" id="pills-being-sent" role="tabpanel" aria-labelledby="pills-contact-tab">

    <!-- Being Sent -->
    
    @if($countTransaction == 0)
            <div class="row justify-content-center mt-5">
                <h3 class="text-booko-primary">There is no transaction yet</h3>
            </div>

        @else
            @foreach($transactionList as $transaction)
            @if($transaction->status->id == 3)
            <div class="card status-booko-list mb-4 shadow card-booko-transaction">
                <div class="card-body p-0">
                    <div class="row pl-3 pr-3">
                        <div class="col d-flex justify-content-between bg-dark text-white">
                        <p class="m-2">{{$transaction->created_at}}</p>
                        <p class="m-2">{{$transaction->order->qty_products}} products</p>
                        </div>
                    </div>
                    <hr class="m-0 mb-3">
                    <div class="row pl-3 pr-3">
                        <div class="col-6">
                        <h6 class="font-weight-bold">Shipping Address</h6>
                        <p>{{$transaction->shipping_address}}</p>
                        <p>No Resi : {{$transaction->resi_code}}</p>
                        </div>
                        <div class="col-3">
                        <p>Status</p>
                        <h6 class="font-weight-bold">{{$transaction->status->name}}</h6>
                        </div>
                        <div class="col-3">
                        <p>Total Pay</p>
                        <h5 class="font-weight-bold text-booko-secondary">Rp {{number_format($transaction->order->price_total + $transaction->order->unique_code , 0, ',', '.')}}</h5>
                        </div>
                    </div>
                    <hr class="m-0 mb-3">
                    <div class="row pl-3 pr-3 mb-3">
                        <div class="col mt-3">
                        <div class="container-fluid">
                            @foreach($detailTransaction as $key => $list)
                                @if($key == $transaction->order->id)
                                    @foreach($list as $detail)
                                        <div class="row mb-2">
                                            <div class="col-1">
                                            <img src="{{ asset('storage/images/products')}}/{{$detail->product->image}}" alt="" height="100" width="70">
                                            </div>
                                            <div class="col-4">
                                            <h6 class="text-booko-primary font-weight-bold pl-3">{{$detail->product->title}}</h6>
                                            <p class="text-gray pl-3">{{$detail->product->author}}</p>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Price</p>
                                            <h6 class="text-booko-secondary font-weight-bold">Rp {{$detail->product->price}}</h6>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Qty</p>
                                            <h6 class="text-booko-secondary font-weight-bold">{{$detail->qty}}</h6>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Sub Total</p>
                                            <h6 class="text-booko-secondary font-weight-bold">{{$detail->subtotal_price}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                    <div class="float-right">
                                        <button wire:click="confirmArrived({{$transaction->id}})" class="btn btn-success">Confirm Arrival</button>
                                    </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        @endif

    </div>
    <div class="tab-pane fade" id="pills-delivered" role="tabpanel" aria-labelledby="pills-contact-tab">
    
    <!-- Delivered -->

    @if($countTransaction == 0)
            <div class="row justify-content-center mt-5">
                <h3 class="text-booko-primary">There is no transaction yet</h3>
            </div>

        @else
            @foreach($transactionList as $transaction)
            @if($transaction->status->id == 4)
            <div class="card status-booko-list mb-4 shadow card-booko-transaction">
                <div class="card-body p-0">
                    <div class="row pl-3 pr-3">
                        <div class="col d-flex justify-content-between bg-dark text-white">
                        <p class="m-2">{{$transaction->created_at}}</p>
                        <p class="m-2">{{$transaction->order->qty_products}} products</p>
                        </div>
                    </div>
                    <hr class="m-0 mb-3">
                    <div class="row pl-3 pr-3">
                        <div class="col-6">
                        <h6 class="font-weight-bold">Shipping Address</h6>
                        <p>{{$transaction->shipping_address}}</p>
                        <p>No Resi : {{$transaction->resi_code}}</p>
                        </div>
                        <div class="col-3">
                        <p>Status</p>
                        <h6 class="font-weight-bold">{{$transaction->status->name}}</h6>
                        </div>
                        <div class="col-3">
                        <p>Total Pay</p>
                        <h5 class="font-weight-bold text-booko-secondary">Rp {{number_format($transaction->order->price_total + $transaction->order->unique_code , 0, ',', '.')}}</h5>
                        </div>
                    </div>
                    <hr class="m-0 mb-3">
                    <div class="row pl-3 pr-3 mb-3">
                        <div class="col mt-3">
                        <div class="container-fluid">
                            @foreach($detailTransaction as $key => $list)
                                @if($key == $transaction->order->id)
                                    @foreach($list as $detail)
                                        <div class="row mb-2">
                                            <div class="col-1">
                                            <img src="{{ asset('storage/images/products')}}/{{$detail->product->image}}" alt="" height="100" width="70">
                                            </div>
                                            <div class="col-4">
                                            <h6 class="text-booko-primary font-weight-bold pl-3">{{$detail->product->title}}</h6>
                                            <p class="text-gray pl-3">{{$detail->product->author}}</p>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Price</p>
                                            <h6 class="text-booko-secondary font-weight-bold">Rp {{$detail->product->price}}</h6>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Qty</p>
                                            <h6 class="text-booko-secondary font-weight-bold">{{$detail->qty}}</h6>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Sub Total</p>
                                            <h6 class="text-booko-secondary font-weight-bold">{{$detail->subtotal_price}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                    <div class="float-right">
                                        <button wire:click="confirmArrived({{$transaction->id}})" class="btn btn-success">Confirm Arrival</button>
                                    </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        @endif
    
    </div>
    <div class="tab-pane fade" id="pills-finished" role="tabpanel" aria-labelledby="pills-contact-tab">
    
    <!-- Finished -->

    @if($countTransaction == 0)
            <div class="row justify-content-center mt-5">
                <h3 class="text-booko-primary">There is no transaction yet</h3>
            </div>

        @else
            @foreach($transactionList as $transaction)
            @if($transaction->status->id == 5)
            <div class="card status-booko-list mb-4 shadow card-booko-transaction">
                <div class="card-body p-0">
                    <div class="row pl-3 pr-3">
                        <div class="col d-flex justify-content-between bg-dark text-white">
                        <p class="m-2">{{$transaction->created_at}}</p>
                        <p class="m-2">{{$transaction->order->qty_products}} products</p>
                        </div>
                    </div>
                    <hr class="m-0 mb-3">
                    <div class="row pl-3 pr-3">
                        <div class="col-6">
                        <h6 class="font-weight-bold">Shipping Address</h6>
                        <p>{{$transaction->shipping_address}}</p>
                        <p>{{$transaction->resi_code}}</p>
                        </div>
                        <div class="col-3">
                        <p>Status</p>
                        <h6 class="font-weight-bold">{{$transaction->status->name}}</h6>
                        </div>
                        <div class="col-3">
                        <p>Total Pay</p>
                        <h5 class="font-weight-bold text-booko-secondary">Rp {{number_format($transaction->order->price_total + $transaction->order->unique_code , 0, ',', '.')}}</h5>
                        </div>
                    </div>
                    <hr class="m-0 mb-3">
                    <div class="row pl-3 pr-3 mb-3">
                        <div class="col mt-3">
                        <div class="container-fluid">
                            @foreach($detailTransaction as $key => $list)
                                @if($key == $transaction->order->id)
                                    @foreach($list as $detail)
                                        <div class="row mb-2">
                                            <div class="col-1">
                                            <img src="{{ asset('storage/images/products')}}/{{$detail->product->image}}" alt="" height="100" width="70">
                                            </div>
                                            <div class="col-4">
                                            <h6 class="text-booko-primary font-weight-bold pl-3">{{$detail->product->title}}</h6>
                                            <p class="text-gray pl-3">{{$detail->product->author}}</p>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Price</p>
                                            <h6 class="text-booko-secondary font-weight-bold">Rp {{$detail->product->price}}</h6>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Qty</p>
                                            <h6 class="text-booko-secondary font-weight-bold">{{$detail->qty}}</h6>
                                            </div>
                                            <div class="separator-booko">
                                            </div>
                                            <div class="col-2">
                                            <p>Sub Total</p>
                                            <h6 class="text-booko-secondary font-weight-bold">{{$detail->subtotal_price}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        @endif
    
    </div>
    </div>

    <!-- End of List Transaction -->

</div>
