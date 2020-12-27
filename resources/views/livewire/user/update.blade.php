<div wire:ignore.self id="updateUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row-fluid">
                        <label for="">Nama</label>
                        <input wire:model="name" type="text" class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">Email</label>
                        <input wire:model="email" type="email" class="form-control">
                        @error('email') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">Avatar</label>
                        <div class="custom-file">
                        <input wire:model="avatar" type="file" class="custom-file-input" id="customFile">
                        <label for="customFile" class="custom-file-label">Choose Image</label>
                        @error('avatar')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                    </div>
                    @if($avatar)
                    <div class="form-group row justify-content-md-center">
                        <div class="col-6">
                        <label for="" class="mt-2">Image Preview :</label>
                        <img src="{{$avatar->temporaryUrl()}}" class="img-fluid" alt="Preview Image">
                        </div>
                    </div>
                    @else
                    <div class="form-group row justify-content-md-center">
                        <div class="col-6">
                        <label for="" class="mt-2">Image Preview :</label>
                        <img src="{{ asset('storage/images/users/'.$avatarUpdate)}}?{{rand()}}" class="img-fluid" alt="Preview Image">
                        </div>
                    </div>
                    @endif
                    <div class="form-group row-fluid">
                        <label for="">noHP</label>
                        <input wire:model="noHP" type="text" class="form-control">
                        @error('noHP') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click.prevent="update" type="button" class="btn btn-primary">Update User</button>
                <script type="text/javascript">
                    window.addEventListener('updateModal', () => {
                        console.log('sampai sini lo');
                        $('#updateUserModal').modal('hide');
                    });
                </script>
            </div>
        </div>
    </div>
</div>
