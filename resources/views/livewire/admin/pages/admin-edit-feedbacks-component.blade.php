

<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Feedback</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.feedback')}}">Feedback</a></li>

                        <li class="breadcrumb-item active">Edit Feedback</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">

            <div class="card p-5">
                <form autocomplete="off" wire:submit.prevent="editFeedback" >
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Title" wire:model="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Slider Image</label>
                        <input type="file" class="input-file" wire:model="new_slider_image">
                        @if($new_slider_image)
                        <img src="{{$new_slider_image->temporaryUrl()}}" alt="" width="100" height="100">
                        @else
                        <img src="{{asset('image/feedback')}}/{{$slider_image}}" alt="" width="100" height="100">
                        @endif
                    </div>


                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times mr-1"></i>
                        Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>

                        <span>Save Change</span>

                    </button>
             
                </form>
            </div>

        </div>
    </div>
</div>