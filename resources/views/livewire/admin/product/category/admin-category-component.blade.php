<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/categories">Category</a></li>

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
                        <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i> Add New Category</button>

                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Image</th>
                                        <th scope="col">
                                            Slug
                                        </th>
                                        <th>
                                            Option
                                        </th>

                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">
                                    @forelse($categories as $index => $category)
                                    <tr>
                                        <th scope="row">{{$categories-> firstItem() + $index }}</th>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            @if( is_null( $category->image_cat) )
                                             img
                                            @else
                                            <img src="{{asset('image')}}/{{$category->image_cat}}" alt="" width="60" height="60">
                                            @endif
                                        </td>
                                        <td>{{$category->slug}}</td>

                                        <td class="align-middle">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a wire:click.prevent="confirmcatRemoval({{ $category->id }})" class="btn btn-danger">Delete</a>
                                                <a href="{{route('admin.categoryEdit',['category_slug' => $category->slug])}}" class="btn btn-success">Edit</a>
                                            </div>
                                        </td>
                                    </tr>

                                    @empty
                                    <tr class="text-center">
                                        <td colspan="10">
                                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                                            <p class="mt-2">No results found</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">

                            <div class="wrap-pagination-info">
                                {{ $categories->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="addcat">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <span>Add New Category</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="addcat">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name" wire:model="name" wire:keyup="generateSlug">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Category Slug</label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Slug" wire:model="slug">
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <label for="customFile">Image</label>
                                    <div class="custom-file">
                                        <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            <input wire:model="image_cat" type="file" class="custom-file-input " id="customFile">


                                            <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="custom-file-label @error ('image_cat') is-invalid @enderror" for="customFile">

                                            @if ($image_cat)
                                            {{$image_cat->temporaryUrl()}}
                                            @else
                                            Choose Image
                                            @endif
                                        </label>
                                        @error('image_cat')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                        @enderror
                                    </div>
                                    @if ($image_cat)
                                    <img src="{{$image_cat-> temporaryUrl() }}" class="img d-block mt-2 w-50 rounded">
                                    @endif
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>
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
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete Category</h5>
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to delete this Category?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                    <button type="button" wire:click.prevent="deletecat" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Delete Category</button>
                </div>
            </div>
        </div>
    </div>
</div>