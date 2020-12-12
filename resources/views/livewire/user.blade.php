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
                <input class="checkbox-tools" type="radio" name="tools" id="tool-1" checked>
                <label class="for-checkbox-tools" for="tool-1">
                    <i class='uil uil-line-alt'></i>
                    <h5 class="font-weight-bold">Another House</h5>
                    <p>Sukosari, RT 01, RW 07, Kelurahan Kebonsari, Temanggung
    Temanggung, Kab. Temanggung, 56223</p>
                </label>
                <input class="checkbox-tools" type="radio" name="tools" id="tool-2">
                <label class="for-checkbox-tools" for="tool-2">
                    <i class='uil uil-vector-square'></i>
                    <h5 class="font-weight-bold">Lukman Haryanto</h5>
                    <p>Kebonsari, RT 01, RW 07, Kelurahan Kebonsari, Temanggung
    Temanggung, Kab. Temanggung, 56223</p>
                </label>
                <input class="checkbox-tools" type="radio" name="tools" id="tool-3">
                <label class="for-checkbox-tools" for="tool-3">
                    <i class='uil uil-ruler'></i>
                    <h5 class="font-weight-bold">Elmantastic</h5>
                    <p>Kebonsari, RT 01, RW 07, Kelurahan Kebonsari, Bandung
    Bandung, Kab. Bandung, zdsa</p>
                </label>
                </div>
                <div class="col">
                <h4 class="font-weight-bold text-booko-primary mb-4">Add Address</h4>
                <form wire:submit.prevent="addProduct">
                <div class="row">
                    <div class="col">
                    <div class="form-group row-fluid">
                        <label for="">Provice</label>
                        <input wire:model="province" onFocus="geolocate()"  type="text" class="form-control" >
                        @error('province') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">City</label>
                        <input wire:model="city" type="text" class="form-control">
                        @error('city') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">Postal Code</label>
                        <input wire:model="postal_code" type="text" class="form-control">
                        @error('postal_code') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">Detail Address</label>
                        <textarea wire:model="detail" type="text" class="form-control" rows="2"></textarea>
                        @error('detail') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <button class="btn btn-block btn-success">
                        Add address
                    </button>
                    </div>
                </div>
                </form>
                </div>
            </div>


            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                Gotchaaa!! Not yet bruh
            </div>
        </div>
        </div>
    </div>
</div>
