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
            <div class="row mt-3">
                <div class="col-3">Password</div>
                <div class="col-6">: Sii password</div>
            </div>
        </div>
    </div>
    <div class="row mt-5 pl-3">
        <ul class="nav nav-tabs w-100 justify-content-center" id="myTab" role="tablist">
            <li class="nav-item col-sm-3 pr-0" role="presentation">
                <a class="nav-link active text-center" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Alamat</a>
            </li>
            <li class="nav-item col-sm-3 pl-0" role="presentation">
                <a class="nav-link text-center" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Bank Account</a>
            </li>
        </ul>
    </div>
    <div class="row mt-3 pl-3">
        <div class="container-fluid">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                        <input wire:model="name" type="text" class="form-control" placeholde="Home1">
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
            </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                Gotchaaa!! Not yet bruh
            </div>
        </div>
    </div>
</div>