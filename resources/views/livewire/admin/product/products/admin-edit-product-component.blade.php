<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/products">Products</a></li>
                  
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <form wire:submit.prevent="updateproduct" class="row g-3 p-2">
                    <div class="col-md-8 border-right">
                    <div class="form-group ">
                                        <label for="exampleInputEmail1" class="form-label">Category</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror "
                                            wire:model="category_id">
                                            
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                              
                                            @endforeach
                                            @error('category_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </select>
                                    </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name"
                                    wire:model="name" wire:keyup="generateSlug">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">

                                <label for="exampleInputEmail1" class="form-label">Stock Status</label>
                                <select class="form-control @error ('stock_status') is-invalid @enderror"
                                    wire:model="stock_status">
                                  
                                    <option value="instock">Instock</option>
                                    <option value="outofstock">Out Of Stock</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Product Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Slug"
                                    wire:model="slug">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Featured</label>
                                <select class="form-control @error('featured') is-invalid @enderror"
                                    wire:model="featured">
                                   
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Reguler Price</label>
                                <input type="text" class="form-control @error('reguler_price') is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Reguler Price"
                                    wire:model="reguler_price">
                                @error('regular_price')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Discount</label>
                                <input type="text" class="form-control @error('discount') is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Discount"
                                    wire:model="discount">
                                @error('discount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" class="form-label">Sale Price</label>
                                <input type="text" class="form-control " id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Sale Price" wire:model="sale_price">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Short Description</label>
                                <textarea cols="60" rows="4" class="form-control " id="exampleFormControlTextarea1"
                                    placeholder="Short Description" wire:model="short_description"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <textarea cols="60" rows="4"
                                    class="form-control @error ('description') is-invalid @enderror"
                                    id="exampleFormControlTextarea1" placeholder="Description"
                                    wire:model="description"></textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1" class="form-label">SKU</label>
                                <input type="text" class="form-control @error ('SKU') is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="SKU"
                                    wire:model="SKU">
                                @error('SKU')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">

                                <label for="exampleInputEmail1" class="form-label">Quantity</label>
                                <input type="text" class="form-control @error ('quantity')  is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Quantity"
                                    wire:model="quantity">
                                @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Lenght</label>
                                    <input type="text"
                                        class="form-control form-control @error('Lenght') is-invalid @enderror"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lenght"
                                        wire:model="Lenght">
                                    @error('lenght')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="exampleInputEmail1" class="form-label">Color</label>
                                <select class="form-control form-control @error('color_id') is-invalid @enderror"
                                    wire:model="color_id">
                                    
                                    @foreach ($colors as $color)
                                    <option value="{{$color->id}}">{{$color->color_rang}}</option>
                                    @endforeach
                                    @error('color_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1" class="form-label">Luster</label>
                                <select class="form-control @error('Luster') is-invalid @enderror" wire:model="Luster">
                        
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                    @error('Luster')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="exampleInputEmail1" class="form-label">Pattern</label>
                                <select class="form-control @error('pattern_id') is-invalid @enderror "
                                    wire:model="pattern_id">
                                   
                                    @foreach ($Patterns as $pattern)
                                    <option value="{{$pattern->id}}">{{$pattern->name}}</option>
                                    @endforeach
                                    @error('pattern_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </select>
                            </div>
                        </div>
               
                       <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Size</label>
                            <input type="text" class="form-control @error ('size') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="size"
                                wire:model="size">
                            @error('size')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                     
                       
                       
                        <div>
                            <label for="exampleInputEmail1" class="form-label">Product Image</label>
                            <input type="file" class="input-file @error('new_image') is-invalid @enderror"
                                wire:model="new_image">

                            @if($new_image)
                            <img src="{{$new_image->temporaryUrl()}}" alt="" width="100" height="100">
                            @else
                            <img src="{{asset('image')}}/{{$image}}" alt="" width="100" height="100">
                            @endif

                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="pl-3 justify-content-md-end">
                        <button type="submit" class="btn btn-success me-md-2">Update</button>
                        <a type="button" href="{{route('admin.products')}}" class="btn btn-secondary me-md-2" aria-label="Close"><i class="fa fa-times mr-1"></i> Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>