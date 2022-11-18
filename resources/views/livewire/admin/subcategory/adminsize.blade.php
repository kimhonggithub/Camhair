<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Size</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/subcategory">Sub Category</a></li>
                        <li class="breadcrumb-item active">Size</li>
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
                                class="fa fa-plus-circle mr-1"></i> Add New Size</button>
                        <x-search-input wire:model="searchTerm" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Size of
                                        <span wire:click="sortBy('category_id')" class="float-right text-sm"
                                                style="cursor: pointer;">
                                                <i
                                                    class="fa fa-arrow-up {{ $sortColumnName === 'category_id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                <i
                                                    class="fa fa-arrow-down {{ $sortColumnName === 'category_id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                            </span>
                                        </th>
                                        <th scope="col">
                                            Size Value
                                            <span wire:click="sortBy('value_sizes')" class="float-right text-sm"
                                                style="cursor: pointer;">
                                                <i
                                                    class="fa fa-arrow-up {{ $sortColumnName === 'value_sizes' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                <i
                                                    class="fa fa-arrow-down {{ $sortColumnName === 'value_sizes' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                            </span>
                                        </th>
                                        <th>
                                            Option
                                        </th>

                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">

                                    @forelse ($sizevalues as $index => $sizevalue)
                                    <tr>
                                        <th scope="row">{{ $sizevalues->firstItem() + $index }}</th>
                                        <td>{{ $sizevalue->category->name }}</td>
                                        <td>{{ $sizevalue->value_sizes}}</td>
                                        <td>
                                            <a href=""
                                                wire:click.prevent="confirmsizevalueRemoval({{ $sizevalue->id }})">
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
                                {{ $sizevalues->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="addsizevalue">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <span>Add New Size</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="addsizevalue">
                            <div class="row">
                                <div class="col-md-8 form-group ">
                                    <label for="exampleInputEmail1" class="form-label">Size of </label>
                                    <select class="form-control @error('category_id') is-invalid @enderror "
                                        wire:model="category_id">
                                        <option selected>Select Category</option>

                                        @for( $i = 0 ; $i< sizeof($categories) ; $i++ ) <option
                                            value="{{$categories[$i]->id}}">{{$categories[$i]->name}}</option>
                                            @endfor
                                            @error('category_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </select>
                                </div>
                                <div class="col-md-8 ">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1" class="form-label">Size value</label>
                                            <input type="text"
                                                class="form-control @error('value_sizes') is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="sizevalue " wire:model="value_sizes">
                                            @error('value_sizes')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
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
                    <h5>Delete sizevalue</h5>
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to delete this sizevalue?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times mr-1"></i> Cancel</button>
                    <button type="button" wire:click.prevent="deletesizevalue" class="btn btn-danger"><i
                            class="fa fa-trash mr-1"></i>Delete sizevalue</button>
                </div>
            </div>
        </div>
    </div>
</div>