<div class="section-post mt-5">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body align-self-center">
                <img class="" src="{{ asset('/images')}}/{{$currentUser->avatar}}" alt="" srcset="" maxheight="100" width="100%">
                <h6 class="mt-4 text-center">{{$currentUser->name}}</h6>
                </div>
            </div>
        </div>
        <div class="col ml-5">
            <h5 class="font-weight-bold">User Information</h5>
            <div class="row mt-3">
                <div class="col-3">Nama</div>
                <div class="col-6">: {{$currentUser->name}}</div>
            </div>
            <div class="row mt-3">
                <div class="col-3">Email</div>
                <div class="col-6">: {{$currentUser->email}}</div>
            </div>
            <div class="row mt-3">
                <div class="col-3">No HP</div>
                <div class="col-6">: 
                    @if(empty($currentUser->noHP))
                        -
                    @else
                        {{$currentUser->noHP}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(empty($currentUser->noHP))
    <div class="container mt-5">
        <div class="row text-center justify-content-center">
            <div class="col-7">
                <h4>You have to enter you phone number before set the shipping address</h4>
                <div class="container mt-4">
                    <form wire:submit.prevent="addNoHP" id="noHP">
                        <div class="form-group">
                            <input wire:model="noHP" type="text" class="form-control" placeholder="ex: 088123456789">
                            @error('noHP') <small class="text-danger">{{$message}}</small>@enderror
                            <button type="submit" class="btn btn-success btn-block mt-3">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row mt-5 pl-3">
        <ul class="nav nav-tabs w-100 justify-content-center" id="myTab" role="tablist">
            <li class="nav-item col-sm-3 pr-0" role="presentation">
                <a class="nav-link active text-center" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Address</a>
            </li>
            <li class="nav-item col-sm-3 pl-0" role="presentation">
                <a class="nav-link text-center" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">List Tansaction</a>
            </li>
        </ul>
    </div>
    <div class="row mt-3 pl-3">
        <div class="container-fluid">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <!-- Address List -->
                <div class="row">
                <div class="col">
                @if($countAddress == 0)
                <div class="mt-5 text-center">
                    <h2 class="text-booko-primary font-weight-bold mb-3">Your Address List Is Empty</h2>
                    <h6>You haven't add any address yet</h6>
                </div>
                @else
                    @foreach($addressList as $index => $address)
                    @if($address->set_default == true)
                    <input wire:click="setDefaultAddress({{$address->id}})" class="checkbox-tools" type="radio" name="address" id="address{{$index+1}}" checked>
                    @else
                    <input wire:click="setDefaultAddress({{$address->id}})" class="checkbox-tools" type="radio" name="address" id="address{{$index+1}}">
                    @endif
                    <label class="for-checkbox-tools" for="address{{$index+1}}">
                        <i class='uil uil-line-alt'></i>
                        <h5 class="font-weight-bold">{{$address->name}}</h5>
                        <p>{{$address->address_detail}},{{$address->city}}, {{$address->province}}, {{$address->postal_code}}</p>
                    </label>
                    @endforeach
                @endif
                </div>
                <div class="col">
                <h4 class="font-weight-bold text-booko-primary mb-4 mt-4">Add Address</h4>
                <form wire:submit.prevent="addAddress" id="address">
                <div class="row">
                    <div class="col">
                    <div class="form-group row-fluid">
                        <label for="">Name the address as</label>
                        <input wire:model="name" type="text" class="form-control" placeholder="ex: Home1">
                        @error('name') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">Provice</label>
                        <input wire:model="province" id="autocomplete" onFocus="geolocate()"  type="text" class="form-control" >
                        @error('province') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">City</label>
                        <input wire:model="city" id="locality" type="text" class="form-control">
                        @error('city') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">Postal Code</label>
                        <input wire:model="postal_code" type="text" class="form-control">
                        @error('postal_code') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">Detail Address</label>
                        <textarea wire:model="detail" id="route" type="text" class="form-control" rows="2"></textarea>
                        @error('detail') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <button type="submit" class="btn btn-block btn-success btn-lg">
                        Add address
                    </button>
                    </div>
                </div>
                </form>
                </div>
                </div>
            <!-- End of Address List -->
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

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
                                <div class="col d-flex justify-content-between popular-category">
                                <p class="m-2">{{$transaction->created_at}}</p>
                                <p class="m-2">{{$transaction->order->qty_products}}</p>
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
                                                    <img src="{{ asset('assets/images/products')}}/{{$detail->product->image}}" alt="" height="100" width="70">
                                                    </div>
                                                    <div class="col-4">
                                                    <h6 class="text-booko-primary font-weight-bold">{{$detail->product->title}}</h6>
                                                    <p class="text-gray">{{$detail->product->author}}</p>
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
                                <div class="col d-flex justify-content-between popular-category">
                                <p class="m-2">{{$transaction->created_at}}</p>
                                <p class="m-2">{{$transaction->order->qty_products}}</p>
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
                                                    <img src="{{ asset('assets/images/products')}}/{{$detail->product->image}}" alt="" height="100" width="70">
                                                    </div>
                                                    <div class="col-4">
                                                    <h6 class="text-booko-primary font-weight-bold">{{$detail->product->title}}</h6>
                                                    <p class="text-gray">{{$detail->product->author}}</p>
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
                                <div class="col d-flex justify-content-between popular-category">
                                <p class="m-2">{{$transaction->created_at}}</p>
                                <p class="m-2">{{$transaction->order->qty_products}}</p>
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
                                                    <img src="{{ asset('assets/images/products')}}/{{$detail->product->image}}" alt="" height="100" width="70">
                                                    </div>
                                                    <div class="col-4">
                                                    <h6 class="text-booko-primary font-weight-bold">{{$detail->product->title}}</h6>
                                                    <p class="text-gray">{{$detail->product->author}}</p>
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
                                <div class="col d-flex justify-content-between popular-category">
                                <p class="m-2">{{$transaction->created_at}}</p>
                                <p class="m-2">{{$transaction->order->qty_products}}</p>
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
                                                    <img src="{{ asset('assets/images/products')}}/{{$detail->product->image}}" alt="" height="100" width="70">
                                                    </div>
                                                    <div class="col-4">
                                                    <h6 class="text-booko-primary font-weight-bold">{{$detail->product->title}}</h6>
                                                    <p class="text-gray">{{$detail->product->author}}</p>
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
            <div class="tab-pane fade" id="pills-finished" role="tabpanel" aria-labelledby="pills-contact-tab">
            
            <!-- Finished -->

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
                                <div class="col d-flex justify-content-between popular-category">
                                <p class="m-2">{{$transaction->created_at}}</p>
                                <p class="m-2">{{$transaction->order->qty_products}}</p>
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
                                                    <img src="{{ asset('assets/images/products')}}/{{$detail->product->image}}" alt="" height="100" width="70">
                                                    </div>
                                                    <div class="col-4">
                                                    <h6 class="text-booko-primary font-weight-bold">{{$detail->product->title}}</h6>
                                                    <p class="text-gray">{{$detail->product->author}}</p>
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
        </div>
        </div>
    </div>
    @endif
</div>
