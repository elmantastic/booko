<div class="section-post mt-5">
    <div class="col p-0">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/')}}" class="font-weight-normal" >Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/cart')}}" class="font-weight-normal" >Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
        </nav>
    </div>
    <div class="row mt-3">
        <div class="col">
            <h2 class="text-booko-primary font-weight-bold">Checkout</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row d-flex justify-content-between align-items-center pl-3 mb-3">
                <h4 class="text-booko-primary">Shipping Address</h4>
            </div>
            @if(empty($currentUser->noHP))
                <div class="text-center">
                <h4>You have to enter you phone number before set the shipping address</h4>
                <div class="container">
                    <form wire:submit.prevent="addNoHP" id="noHP">
                        <div class="form-group">
                            <input wire:model="noHP" type="text" class="form-control" placeholder="ex: 088123456789">
                            @error('noHP') <small class="text-danger">{{$message}}</small>@enderror
                            <button type="submit" class="btn btn-success btn-block mt-3">Save</button>
                        </div>
                    </form>
                </div>
                </div>
            @else
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
                <hr>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-block border text-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                Add Address
                </button>

                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
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
                        
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button wire:click.prevent="addAddress" type="button" class="btn btn-primary">Save changes</button>
                        <script type="text/javascript">
                            window.addEventListener('saveAddress', () => {
                                console.log('sampai sini lo');
                                $('#exampleModalCenter').modal('hide');
                            });
                        </script>
                    </div>
                    </div>
                </div>
                </div>
            @endif
        </div>
        <div class="col">
            <h4 class="mb-4">Metode Pembayaran</h4>
            <div class="card p-2">
                <div class="media align-items-center">
                    <img class="mr-3" src="{{asset('assets/images/Logo/bri.png')}}" alt="Bank BRI" width="60">
                    <div class="media-body">
                        <h5 class="mt-0">Bank Rakyat Indonesia</h5>
                    </div>
                </div>
            </div>
            
            <hr>
            <p>Silahkan transfer pada rekening diatas untuk menyelesaikan pembayaran</p>
            <div class="row">
                <div class="col-4">
                    <h6 class="font-weight-bold text-secondary">Total Price</h6>
                </div>
                <div class="col">
                    <h4 class="font-weight-bold text-booko-primary text-right">Rp {{number_format($order->price_total , 0, ',', '.')}}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h6 class="font-weight-bold text-secondary">Unique Code</h6>
                </div>
                <div class="col">
                    <h4 class="font-weight-bold text-booko-primary text-right">{{number_format($order->unique_code , 0, ',', '.')}}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h6 class="font-weight-bold text-secondary">Total Pay</h6>
                </div>
                <div class="col">
                    <h4 class="font-weight-bold text-booko-primary text-right">Rp {{number_format($total_pay , 0, ',', '.')}}</h4>
                </div>
            </div>
            <button wire:click.prevent="checkout" type="button" class="btn btn-block btn-success btn-lg font-weight-bold mt-4 text-white"">Checkout Now</button>
        </div>
    </div>
    <div class="mt-5"></div>
</div>
