<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Lenght</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/subcategory">Sub Category</a></li>
                        <li class="breadcrumb-item active">lenght</li>
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
                                class="fa fa-plus-circle mr-1"></i> Add New lenght</button>
                        <x-search-input wire:model="searchTerm" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>

                                        <th scope="col">
                                            Value
                                            <span wire:click="sortBy('values')" class="float-right text-sm"
                                                style="cursor: pointer;">
                                                <i
                                                    class="fa fa-arrow-up {{ $sortColumnName === 'values' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                <i
                                                    class="fa fa-arrow-down {{ $sortColumnName === 'values' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                            </span>
                                        </th>
                                        <th>
                                            Option
                                        </th>

                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">

                                    @forelse ($lenghts as $index => $lenght)
                                    <tr>
                                        <th scope="row">{{ $lenghts->firstItem() + $index }}</th>

                                        <td>{{ $lenght->values }}</td>
                                        <td>
                                            <a href="" wire:click.prevent="confirmlenghtRemoval({{ $lenght->id }})">
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
                                {{ $lenghts->links() }}

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
            <form autocomplete="off" wire:submit.prevent="addlenght">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <span>Add New lenght</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="addlenght">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1" class="form-label">Lenght value</label>
                                            <input type="text" class="form-control @error('values') is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="lenght " wire:model="values" >
                                            @error('values')
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
                    <h5>Delete lenght</h5>
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to delete this lenght?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times mr-1"></i> Cancel</button>
                    <button type="button" wire:click.prevent="deletelenght" class="btn btn-danger"><i
                            class="fa fa-trash mr-1"></i>Delete lenght</button>
                </div>
            </div>
        </div>
    </div>
</div>