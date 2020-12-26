<div wire:ignore.self id="updateProductModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row-fluid">
                        <label for="">Title</label>
                        <input wire:model="title" type="text" class="form-control">
                        @error('title') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">Image</label>
                        <div class="custom-file">
                        <input wire:model="image" type="file" class="custom-file-input" id="customFile">
                        <label for="customFile" class="custom-file-label">Choose Image</label>
                        @error('image')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                    </div>
                    @if($image)
                    <div class="form-group row justify-content-md-center">
                        <div class="col-6">
                        <label for="" class="mt-2">Image Preview :</label>
                        <img src="{{$image->temporaryUrl()}}" class="img-fluid" alt="Preview Image">
                        </div>
                    </div>
                    @else
                    <div class="form-group row justify-content-md-center">
                        <div class="col-6">
                        <label for="" class="mt-2">Image Preview :</label>
                        <img src="{{ asset('storage/images/products/'.$imageUpdate)}}" class="img-fluid" alt="Preview Image">
                        </div>
                    </div>
                    @endif
                    <div class="form-group row-fluid">
                        <label for="">Category</label>
                        <select wire:model="category" class="form-control row-fluid">
                        <option option value="">Choose Category</option>
                        @foreach($categoryList as $index=>$category)
                        
                        @if($category->name == $category)
                        <option value="{{$category->name}}" selected >{{$category->name}}</option>
                        @else
                        <option value="{{$category->name}}" >{{$category->name}}</option>
                        @endif
                        
                        @endforeach
                        </select>
                        @error('category') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">Author</label>
                        <input wire:model="author" type="text" class="form-control">
                        @error('author') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                        <label for="">Publisher</label>
                        <input wire:model="publisher" type="text" class="form-control">
                        @error('publisher') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group row-fluid">
                    <label for="">Description</label>
                    <textarea wire:model="description" type="text" class="form-control" rows="10"></textarea>
                    @error('description') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="row">
                        <div class="form-group col">
                        <label for="">Year</label>
                        <input wire:model="year" type="number" class="form-control">
                        @error('year') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group col">
                        <label for="">Pages</label>
                        <input wire:model="pages" type="number" class="form-control">
                        @error('pages') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                        <label for="">Stock</label>
                        <input wire:model="stock" type="number" class="form-control">
                        @error('stock') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group col">
                        <label for="">Price</label>
                        <input wire:model="price" type="number" class="form-control">
                        @error('price') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                    </div>
                    <button wire:click.prevent="update()" class="btn btn-dark">Update Product</button>
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener('updateModal', () => {
            console.log('sampai sini lo');
            $('#updateProductModal').modal('hide');
        });
    </script>
</div>
