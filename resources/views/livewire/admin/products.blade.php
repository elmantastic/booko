<div class="container-fluid">
  <div class="row mb-5">
    <div class="col">
      <div class="card border-0">
        <div class="card-body">
        <h2 class="font-weight-bold mb-4">Product List</h2>
        <div class="d-flex justify-content-between align-items-center mb-5">
            <!-- Modal Trigger Button -->
            <button class="btn btn-success " data-toggle="modal" data-target="#exampleModalCenter" >Add Product</button>
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
                        <div class="form-group row-fluid">
                          <label for="">Category</label>
                          <select wire:model="category" class="form-control row-fluid">
                            <option option value="" selected>Choose Category</option>
                            <option value="adventure" >Adventure</option>
                            <option value="action">Action</option>
                            <option value="biography">Biography</option>
                            <option value="business">Business</option>
                            <option value="classic">Classic</option>
                            <option value="comedy">Comedy</option>
                            <option value="comic">Comic</option>
                            <option value="cookbooks">Cookbooks</option>
                            <option value="crime">Crime</option>
                            <option value="fantasy">Fantasy</option>
                            <option value="fiction">Fiction</option>
                            <option value="history">History</option>
                            <option value="horror">Horror</option>
                            <option value="mystery">Mystery</option>
                            <option value="non_fiction">Non-Fiction</option>
                            <option value="romance">Romance</option>
                            <option value="sci-fi">Sci-fi</option>
                            <option value="thrillers">Thrillers</option>
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
                        </form>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button wire:click.prevent="addProduct" type="button" class="btn btn-primary">Save Product</button>
                            <script type="text/javascript">
                                window.addEventListener('saveProduct', () => {
                                    console.log('sampai sini lo');
                                    $('#exampleModalCenter').modal('hide');
                                });
                            </script>
                        </div>
                    </div>
                </div>
                </div>


            <div class="input-group input-group-booko">
            <input wire:model="search" type="text" class="input-search-booko form-control " placeholder="Search..." aria-label="Search" aria-describedby="basic-addon1">
            <span class="input-group-text bg-transparent-booko btn-search-booko border-0" id="basic-addon1"><i class="fa fa-search"></i></span>
            </div>
        </div>
          
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
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $index=>$product)
              <tr>
                <td>{{$index + $products->firstItem()}}</td>
                <td>{{$product->title}}</td>
                <td class="text-center"><img src="{{ asset('storage/images/products/'.$product->image)}}" alt="product-image" class="img-fluid justify-content-center image-product-admin" width="30%"></td>
                <td>{{ substr($product->description, 0, 100)}}...</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->author}}</td>
                <td>{{$product->publisher}}</td>
                <td>{{$product->year}}</td>
                <td>{{$product->pages}}</td>
                <td>
                  <div class="form-group d-flex">
                    <button class="border-0 btn-primary rounded-left p-3"><i class="fa fa-edit" ></i></button>
                    <button class="border-0 btn-secondary rounded-right p-3"><i class="fa fa-trash-alt"></i></button>
                  </div>
                </td>
              </tr>
            @endforeach
            </tbody>
            </table>
            <div class="container-sm mt-5 d-flex justify-content-center">
            {{ $products->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
