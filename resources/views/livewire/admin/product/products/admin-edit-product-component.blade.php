<div>
    
<br>
<br>
<br>
<h1 class="text-center">Edit Product</h1>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col">
      
    </div>
    <div class="col">
<form wire:submit.prevent="updateProduct">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name" wire:model="name" wire:keyup="generateSlug">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Slug</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Slug" wire:model="slug">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Short Description</label>
    <textarea cols="60" rows="4" class="form-control" id="exampleFormControlTextarea1" placeholder="Short Description" wire:model="short_description"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <textarea cols="60" rows="4" class="form-control" id="exampleFormControlTextarea1"placeholder="Description" wire:model="description"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Reguler Price</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Reguler Price" wire:model="reguler_price">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Discount</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Discouunt" wire:model="discount">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Sale Price</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sale Price" wire:model="sale_price">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">SKU</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="SKU" wire:model="SKU">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Stock Status</label>
    <select class="form-control" wire:model="stock_status">
        <option value="instock">Instock</option>
        <option value="outofstock">Out Of Stock</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Featured</label>
    <select class="form-control" wire:model="featured">
        <option value="0">No</option>
        <option value="1">Yes</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Quantity" wire:model="quantity">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Image</label>
    <input type="file" class="input-file" wire:model="new_image">
    @if($new_image)
        <img src="{{$new_image->temporaryUrl()}}" alt="" width="100" height="100">
    @else
        <img src="{{asset('image')}}/{{$image}}" alt="" width="100" height="100">
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">category</label>
    <select class="form-control" wire:model="category_id">
        <option value="" disabled selected>Select Category</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn_custom">Update</button>
</form>
    </div>
    <div class="col">
    
    </div>
  </div>
</div>
<br>
<br>



</div>