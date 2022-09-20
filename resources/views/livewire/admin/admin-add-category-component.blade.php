

<div class="container">
<br>
<br>
<br>
    <h1 class="text-center">Add Category</h1>
    <br>
    <br>
    <div class="container">
  <div class="row">
    <div class="col">
      
    </div>
    <div class="col">
<form wire:submit.prevent="addCategory">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="name" wire:keyup="generateSlug">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Slug</label>
    <input type="text" class="form-control" id="exampleInputPassword1" wire:model="slug">
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