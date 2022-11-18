<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Closure</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.products')}}">Products</a></li>
                        <li class="breadcrumb-item "><a href="{{route('admin.closure')}}">Clsoure Hair</a></li>
                        <li class="breadcrumb-item active">Edit Closure Hair</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">

            <div class="card p-2">
                <form wire:submit.prevent="updateproduct" class="row g-3 p-2">
                    <div class="row">
                        <div class="col-md-8 border-right">
                            <div class="form-row ">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror "
                                        wire:model="category_id" disabled>
                                        <option value="{{$category_id}}">{{$cat_name}}</option>
                                        @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group col-md-6">

                                    <label for="exampleInputEmail1" class="form-label">Stock Status</label>
                                    <select class="form-control @error ('stock_status') is-invalid @enderror"
                                        wire:model="stock_status">
                                        <option selected>Select status</option>
                                        <option value="instock">Instock</option>
                                        <option value="outofstock">Out Of Stock</option>
                                    </select>
                                </div>
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
                                    <label for="exampleInputEmail1" class="form-label">Product Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Slug"
                                        wire:model="slug">
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
                                    <label for="exampleInputEmail1" class="form-label">Short
                                        Description</label>
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
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1" class="form-label">Lenght</label>
                                    <select class="form-control form-control @error('lenghts_id') is-invalid @enderror"
                                        wire:model="lenghts_id">
                                        <option selected>Select lenght</option>
                                        @foreach ($lenghts as $lenght)
                                        <option value="{{$lenght->id}}">{{$lenght->values}}</option>
                                        @endforeach
                                        @error('lenghts_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1" class="form-label">Color</label>
                                    <select class="form-control form-control @error('color_id') is-invalid @enderror"
                                        wire:model="color_id">
                                        <option selected>Select Colors</option>
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
                                    <select class="form-control @error('Luster') is-invalid @enderror"
                                        wire:model="Luster">
                                        <option selected>Select luster</option>
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
                                        <option selected>Select Pattern</option>
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
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">Size</label>
                                    <select
                                        class="form-control form-control @error('sizevalue_id') is-invalid @enderror"
                                        wire:model="sizevalue_id">
                                        <option selected>Select Size</option>
                                        @foreach ($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->value_sizes}}</option>
                                        @endforeach
                                        @error('sizevalue_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="exampleInputEmail1" class="form-label">Wigcap</label>
                                    <select class="form-control form-control @error('wigcaps_id') is-invalid @enderror"
                                        wire:model="wigcaps_id">
                                        <option selected>Select wigcap</option>
                                        @foreach ($wigcaps as $wigcap)
                                        <option value="{{$wigcap->id}}">{{$wigcap->name}}</option>
                                        @endforeach
                                        @error('wigcaps_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-row">
                                <label for="exampleInputEmail1" class="form-label">Product Image</label>
                                <input type="file" class="input-file @error('new_image') is-invalid @enderror"
                                    wire:model="new_image">
                                @if($new_image)
                                <img src="{{$new_image->temporaryUrl()}}" alt="" width="100" height="100">
                                @else
                                <img src="{{asset('image')}}/{{$product_thumbnail}}" alt="" width="100"
                                    height="100">
                                @endif
                                @error('product_thumbnail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-row">
                                <label for="customFile">Related image</label>
                                <div class="custom-file">
                                    <div x-data="{ isUploading: false, progress: 5 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                                        <input wire:model="images" type="file" class="form-control" id="customFile"
                                            multiple>
                                        <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                            <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                x-bind:style="`width: ${progress}%`">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    @error('images')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                                @foreach($pimages as $pimage)
                                <div class="p-5 position-relative">
                                    <img src="{{asset('image/all')}}/{{$pimage->image_name}}" width="100" alt="">
                                    <span
                                        class="position-absolute  start-100 translate-middle bg-danger border border-light rounded-circle">
                                        <a href="#" wire:click.prevent="deleteImage({{$pimage->id}})"><span
                                                class="visually-hidden p-2"><i class="fa-solid fa-xmark"></i></span></a>
                                    </span>

                                </div>
                                @endforeach
                                @foreach($images as $items)
                                <div>
                                    <img src="{{ $items->temporaryUrl()}}" width="100">
                                </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="pl-3 justify-content-md-end">
                            <button type="submit" class="btn btn-success me-md-2">Update</button>
                            <a type="button" href="{{route('admin.closure')}}" class="btn btn-secondary me-md-2"
                                aria-label="Close">Back</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>