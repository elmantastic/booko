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
</div>
