<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Feedback</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item active">Feedabcks</li>
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
                                class="fa fa-plus-circle mr-1"></i> Add New Feedback</button>
                        <x-search-input wire:model="searchTerm" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">
                                            Image
                                        </th>
                                        <th scope="col">
                                            Title
                                            <span wire:click="sortBy('title')" class="float-right text-sm"
                                                style="cursor: pointer;">
                                                <i
                                                    class="fa fa-arrow-up {{ $sortColumnName === 'tilte' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                <i
                                                    class="fa fa-arrow-down {{ $sortColumnName === 'title' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                            </span>
                                        </th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody wire:loading.class="text-muted">

                                    @forelse ($feedbacks as $index => $feedback)
                                    <tr>
                                        <th scope="row">{{ $feedbacks->firstItem() + $index }}</th>
                                        <td>
                                            <img src="{{asset('image/feedback')}}/{{$feedback->slider_image}}" alt=""
                                                width="50" height="50">

                                        </td>
                                        <td>
                                            {{$feedback->title}}
                                        </td>
                                        <td><a href="{{route('admin.editfeedback',['feedback_id' => $feedback->id])}}">
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>

                                            <a href="" wire:click.prevent="confirmfeedbackRemoval({{ $feedback->id }})">
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
                                {{ $feedbacks->links() }}

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
            <form autocomplete="off" wire:submit.prevent="addFeedback">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">

                            <span>Add New Feedback</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Title" wire:model="title">
                        </div>
         
                        <div class="mb-3">
                            <label for="customFile">Image</label>
                            <div class="custom-file">
                                <div x-data="{ isUploading: false, progress: 5 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input wire:model="slider_image" type="file" class="custom-file-input " id="customFile">


                                    <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                            x-bind:style="`width: ${progress}%`">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                                <label class="custom-file-label @error ('slider_image') is-invalid @enderror" for="customFile">
                                    @if ($slider_image)
                                    {{$slider_image->temporaryUrl()}}
                                    @else
                                    Choose Image
                                    @endif
                                </label>
                                @error('slider_image')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                                @enderror
                            </div>
                            @if ($slider_image)
                            <img src="{{ $slider_image->temporaryUrl() }}" class="img d-block mt-2 w-50 rounded">
                            @endif
                        </div>


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
                    <h5>Delete Feedback</h5>
                </div>

                <div class="modal-body">
                    <h4>Are you sure you want to delete this Feedback?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times mr-1"></i> Cancel</button>
                    <button type="button" wire:click.prevent="deletefeedback" class="btn btn-danger"><i
                            class="fa fa-trash mr-1"></i>Delete Feedback</button>
                </div>
            </div>
        </div>
    </div>
</div>