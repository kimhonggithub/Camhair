<div>
<div>
    
    <br>
    <br>
    <br>
    <h1 class="text-center">Edit Slider</h1>
    <br>
    <br>
    <div class="container">
      <div class="row">
        <div class="col">
          
        </div>
        <div class="col">
    <form wire:submit.prevent="editSlide">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" wire:model="title">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Subtitle</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Subtitle" wire:model="subtitle">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Price</label>
        <input class="form-control" id="exampleFormControlTextarea1" placeholder="Price" wire:model="price"></input>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Link</label>
        <input class="form-control" id="exampleFormControlTextarea1"placeholder="Link" wire:model="link"></input>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Slider Image</label>
        <input type="file" class="input-file" wire:model="new_slider_image">
        @if($new_slider_image)
        
        <img src="{{$new_slider_image->temporaryUrl()}}" alt="" width="100" height="100">
        @else
        <img src="{{asset('image/slider')}}/{{$slider_image}}" alt="" width="100" height="100">
        @endif
      </div>
      
      <button type="submit" class="btn btn_custom">Submit</button>
    </form>
        </div>
        <div class="col">
        
        </div>
      </div>
    </div>
    <br>
    <br>
    
    
    
    </div>
</div>
