<div class="">
  <div class="row mb-5">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h2 class="font-weight-bold mb-4">Product List</h2>
            <table class="table table-bordered table-hover table-responsive">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">image</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Author</th>
                <th scope="col">Publisher</th>
                <th scope="col">Year</th>
                <th scope="col">Pages</th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $index=>$product)
              <tr>
                <td>{{$index+1}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->image}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->author}}</td>
                <td>{{$product->publisher}}</td>
                <td>{{$product->year}}</td>
                <td>{{$product->pages}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h2 class="font-weight-bold mb-4">Add Product</h2>
          <form>
          <div class="row">
            <div class="col-4">
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
              @endif
            </div>
            <div class="col-4">
              <div class="form-group row-fluid">
                <label for="">Category</label>
                <input wire:model="category" type="text" class="form-control">
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
            </div>
            <div class="col-4">
              <div class="form-group row-fluid">
                <label for="">Year</label>
                <input wire:model="pages" type="text" class="form-control">
                @error('pages') <small class="text-danger">{{$message}}</small>@enderror
              </div>
              <div class="form-group row-fluid">
                <label for="">Pages</label>
                <input wire:model="pages" type="text" class="form-control">
                @error('pages') <small class="text-danger">{{$message}}</small>@enderror
              </div>
              <div class="form-group row-fluid">
                <label for="">Stock</label>
                <input wire:model="stock" type="text" class="form-control">
                @error('stock') <small class="text-danger">{{$message}}</small>@enderror
              </div>
              <div class="form-group row-fluid">
                <label for="">Price</label>
                <input wire:model="price" type="text" class="form-control">
                @error('price') <small class="text-danger">{{$message}}</small>@enderror
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-8"></div>
            <div class="col-4 align-self-end">
              <button class="btn btn-success btn-block btn-lg">Save</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>