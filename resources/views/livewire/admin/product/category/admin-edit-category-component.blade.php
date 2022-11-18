<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item "><a href="{{route('admin.category')}}">Category</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container ">
            <div class="card p-2">
                <div class="card-body">
                    <form wire:submit.prevent="UpdateCategory">
                        <div class="row">
                            <div class="col-md-7 border-right">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="name"
                                            wire:keyup="generateSlug">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Category Slug</label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Category Slug" wire:model="slug">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-row">
                                    <div class="from-group">
                                        <label for="exampleInputEmail1" class="form-label">Product Image</label>
                                        <input type="file" class="input-file @error('new_image') is-invalid @enderror"
                                            wire:model="new_image">
                                        @if($new_image)
                                           <img src="{{$new_image->temporaryUrl()}}" alt="" width="100" height="100">
                                        @else
                                            <img src="{{asset('image')}}/{{$image_cat}}" alt="" width="100" height="100">
                                        @endif
                                        @error('image_cat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="pt-5 justify-content-md-end">
                                <button type="submit" class="btn btn-success me-md-2">Update</button>
                                <a type="button" href="{{route('admin.category')}}" class="btn btn-secondary me-md-2"
                                    aria-label="Close">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>