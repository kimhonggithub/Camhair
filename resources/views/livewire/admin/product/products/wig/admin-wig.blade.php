<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Wig Hair</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/products">Product</a></li>
                        <li class="breadcrumb-item active">Wig Hair</li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-2">
                        <button wire:click.prevent="addNew" class="btn btn-primary"><i
                                class="fa fa-plus-circle mr-1"></i> Add New Wig Hair</button>
                        <x-search-input wire:model="searchTerm" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Images</th>
                                        <th scope="col">
                                            Name
                                            <span wire:click="sortBy('name')" class="float-right text-sm"
                                                style="cursor: pointer;">
                                                <i
                                                    class="fa fa-arrow-up {{ $sortColumnName === 'name' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                <i
                                                    class="fa fa-arrow-down {{ $sortColumnName === 'name' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            Price
                                        </th>
                                        <th scope="col">Pattern</th>
                                        <th scope="col">Luster
                                            <span wire:click="sortBy('Luster')" class="float-right text-sm"
                                                style="cursor: pointer;">
                                                <i
                                                    class="fa fa-arrow-up {{ $sortColumnName === 'Luster' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                <i
                                                    class="fa fa-arrow-down {{ $sortColumnName === 'Luster' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                            </span>
                                        </th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">wigcap</th>
                                        <th scope="col">Lenght</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">
                                    @forelse ($products as $index => $product)
                                    <tr>
                                        <th scope="row">{{ $products->firstItem() + $index }}</th>
                                        <th>
                                            <img src="{{asset('image')}}/{{$product->product_thumbnail}}" alt=""
                                                width="60" height="60">
                                        </th>
                                        <th>
                                            <?php
                                            $proimg = App\Models\ProductImage::where('product_id', $product->id)->get();
                                            ?>
                                            @foreach($proimg as $pimage )
                                            <img src="{{ asset('image/all') }}/{{ $pimage->image_name}}" alt=""
                                                width="50" height="50">
                                            @endforeach
                                        </th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->reguler_price }}</td>
                                        <td>{{ $product->patterns->name }}</td>
                                        <td>{{ $product->Luster}}</td>
                                        <td>{{ $product->colors->color_rang }}</td>
                                        <td>{{ $product->sizevalue->value_sizes}}</td>
                                        <td>{{ $product->wigcaps->name}}</td>
                                        <td>{{ $product->lenghts->values }}</td>
                                        <td><a href="{{route('admin.editclosure',['product_slug' => $product->slug])}}">
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>

                                            <a href="" wire:click.prevent="confirmproductRemoval({{ $product->id }})">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="10">
                                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg"
                                                alt="No results found">
                                            <p class="mt-2">No results found</p>
                                        </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">

                            <div class="wrap-pagination-info">
                                {{ $products->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-xl" role="document">
            <form autocomplete="off" wire:submit.prevent="addProduct">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <span>Add New Closure Hair</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
</div>
                    <div class="modal-body">
                        <form wire:submit.prevent="addProduct">
                            <div class="row">
                                <div class="col-lg-8 border-right">
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
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Product Name" wire:model="name" wire:keyup="generateSlug">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1" class="form-label">Product Slug</label>
                                            <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Product Slug" wire:model="slug">
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1" class="form-label">Reguler Price</label>
                                            <input type="text"
                                                class="form-control @error('reguler_price') is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Reguler Price" wire:model="reguler_price">
                                            @error('regular_price')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1" class="form-label">Discount</label>
                                            <input type="text"
                                                class="form-control @error('discount') is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Discount" wire:model="discount">
                                            @error('discount')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1" class="form-label">Sale Price</label>
                                            <input type="text" class="form-control " id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Sale Price"
                                                wire:model="sale_price">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1" class="form-label">Short Description</label>
                                            <textarea cols="60" rows="4" class="form-control "
                                                id="exampleFormControlTextarea1" placeholder="Short Description"
                                                wire:model="short_description"></textarea>
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
                                            <input type="text"
                                                class="form-control @error ('quantity')  is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Quantity" wire:model="quantity">
                                            @error('quantity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="exampleInputEmail1" class="form-label">Lenght</label>
                                            <select
                                                class="form-control form-control @error('lenghts_id') is-invalid @enderror"
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
                                        <div class="form-group col-sm-4">
                                            <label for="exampleInputEmail1" class="form-label">Color</label>
                                            <select
                                                class="form-control form-control @error('color_id') is-invalid @enderror"
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
                                        <div class="form-group col-sm-4">
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
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
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
                                            <select
                                                class="form-control form-control @error('wigcaps_id') is-invalid @enderror"
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
                                <div class="col-lg-4">
                                    <div class="form-row">
                                        <label for="customFile">Image</label>
                                        <div class="custom-file">
                                            <div x-data="{ isUploading: false, progress: 5 }"
                                                x-on:livewire-upload-start="isUploading = true"
                                                x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                                x-on:livewire-upload-error="isUploading = false"
                                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                <input wire:model="product_thumbnail" type="file"
                                                    class="custom-file-input " id="customFile">


                                                <div x-show.transition="isUploading"
                                                    class="progress progress-sm mt-2 rounded">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                                        <span class="sr-only">40% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label
                                                class="custom-file-label @error ('product_thumbnail') is-invalid @enderror"
                                                for="customFile">
                                                @if($product_thumbnail)
                                                {{$product_thumbnail->temporaryUrl()}}
                                                @else
                                                Choose Image
                                                @endif
                                            </label>
                                            @error('product_thumbnail')
                                            <div class="invalid-feedback">
                                                {{ $message}}
                                            </div>
                                            @enderror
                                        </div>
                                        @if ($product_thumbnail)
                                        <img src="{{ $product_thumbnail->temporaryUrl() }}"
                                            class="img d-block mt-2 w-50 rounded">
                                        @endif
                                    </div>
                                    <br>
                                    <hr>

                                    <div class="form-row">
                                        <label for="customFile">Related image</label>
                                        <div class="custom-file">
                                            <div x-data="{ isUploading: false, progress: 5 }"
                                                x-on:livewire-upload-start="isUploading = true"
                                                x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                                x-on:livewire-upload-error="isUploading = false"
                                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                <input wire:model="images" type="file" class="form-control"
                                                    id="customFile" multiple>
                                                <div x-show.transition="isUploading"
                                                    class="progress progress-sm mt-2 rounded">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100" x-bind:style="`width: ${progress}%`">
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
                                        @foreach($images as $items)
                                        <img src="{{ $items->temporaryUrl()}}" class="img d-block mt-2 w-50 rounded">
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-times mr-1"></i>
                            Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                       
                            <span>Save</span>
                   
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete product</h5>
                </div>

                <div class="modal-body">
                    <h4>Are you sure you want to delete this product?</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times mr-1"></i> Cancel</button>
                    <button type="button" wire:click.prevent="deleteproduct" class="btn btn-danger"><i
                            class="fa fa-trash mr-1"></i>Delete product</button>
                </div>
            </div>
        </div>
    </div>
</div>