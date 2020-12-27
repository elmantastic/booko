<div class="container-fluid">
@include('livewire.admin.product.update')
@include('livewire.admin.product.delete')
@include('livewire.admin.product.create')
  <div class="row mb-5">
    <div class="col">
      <div class="card border-0">
        <div class="card-body">
          @if (session()->has('message'))
              <div class="alert alert-success">
                  {{ session('message') }}
              </div>
          @endif
        <h2 class="font-weight-bold mb-4">Product List</h2>
        <div class="d-flex justify-content-between align-items-center mb-5">
            <!-- Modal Trigger Button -->
            <button class="btn btn-success " data-toggle="modal" data-target="#exampleModalCenter" >Add Product</button>
            <div class="input-group input-group-booko">
            <input wire:model="search" type="text" class="input-search-booko form-control " placeholder="Search..." aria-label="Search" aria-describedby="basic-addon1">
            <span class="input-group-text bg-transparent-booko btn-search-booko border-0" id="basic-addon1"><i class="fa fa-search"></i></span>
            </div>
        </div>
          
            <table class="table table-hover table-responsive">
            <thead class="thead-dark">
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
                <td class="text-center"><img src="{{ asset('storage/images/products/'.$product->image)}}?{{rand()}}" alt="product-image" class="img-fluid justify-content-center image-product-admin" width="30%"></td>
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
                    <button wire:click="edit({{ $product->id }})" data-toggle="modal" data-target="#updateProductModal"  class="border-0 btn-primary rounded-left p-3"><i class="fa fa-edit" ></i></button>
                    <button wire:click="remove({{ $product->id }})" data-toggle="modal" data-target="#deleteProductModal" class="border-0 btn-secondary rounded-right p-3"><i class="fa fa-trash-alt"></i></button>
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