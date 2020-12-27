<div class="container-fluid">
@include('livewire.admin.user.update')
@include('livewire.admin.user.delete')
  <div class="row mb-5">
    <div class="col">
      <div class="card border-0">
        <div class="card-body">
          @if (session()->has('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
          @if (session()->has('warning'))
              <div class="alert alert-danger">
                  {{ session('warning') }}
              </div>
          @endif
        <h2 class="font-weight-bold mb-4">Users List</h2>
        <div class="float-right mb-5">
            <div class="input-group input-group-booko">
            <input wire:model="search" type="text" class="input-search-booko form-control " placeholder="Search..." aria-label="Search" aria-describedby="basic-addon1">
            <span class="input-group-text bg-transparent-booko btn-search-booko border-0" id="basic-addon1"><i class="fa fa-search"></i></span>
            </div>
        </div>
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col" style="text-align: center">Avatar</th>
                <th scope="col">Email</th>
                <th scope="col">No HP</th>
                <th scope="col">Active Address</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $index=>$user)
              <tr>
                <td>{{$index + $users->firstItem()}}</td>
                <td>{{$user->name}}</td>
                <td class="text-center w-25"><img src="{{ asset('/storage/images/users')}}/{{$user->avatar}}?{{rand()}}" alt="product-image" class="img-fluid justify-content-center image-product-admin" width="10%"></td>
                <td>{{$user->email}}</td>
                @if(empty($user->noHP))
                  <td>-</td>
                @else
                  <td>{{$user->noHP}}</td>
                @endif
                @foreach($addressList as $key => $list)
                  @if($key == $user->id)
                  <td>{{$list}}</td>
                  @endif
                @endforeach
                @if(!isset($addressList[$user->id]))
                  <td>-</td>
                @endif
                <td>
                  <div class="form-group d-flex">
                    <button wire:click="edit({{ $user->id }})" data-toggle="modal" data-target="#updateUserModal" class="border-0 btn-primary rounded-left p-3"><i class="fa fa-edit" ></i></button>
                    <button wire:click="remove({{ $user->id }})" data-toggle="modal" data-target="#deleteUserModal" class="border-0 btn-secondary rounded-right p-3"><i class="fa fa-trash-alt"></i></button>
                  </div>
                </td>
              </tr>
            @endforeach
            </tbody>
            </table>
            <div class="container-sm mt-5 d-flex justify-content-center">
            {{ $users->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
