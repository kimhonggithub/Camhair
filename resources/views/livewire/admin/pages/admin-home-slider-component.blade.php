<div>

<div class="container">
<div class="">
@if(Session::has('msg'))
        <br>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{Session::get('msg')}}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
@endif
</div>
    <br>
    <br>
    <br>
    <h1 class="text-center">All Slider</h1>
    <br>
    <br>
    <a class="btn btn_custom" href="{{route('admin.addSlider')}}">Add Slider</a>
    <br>
    <br>
    <div class="table-responsive">
    <table class="table align-middle">
    <thead class="admin_table">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Subtitle</th>
        <th scope="col">Price</th>
        <th scope="col">Link</th>
        <th scope="col">Date</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sliders as $slider)
        <tr>
            <th scope="row">{{$slider->id}}</th>
            <td><img src="{{asset('image/slider')}}/{{$slider->slider_image}}" alt="" width="60" height="60"></td>
            <td>{{$slider->title}}</td>
            <td>{{$slider->subtitle}}</td>
            <td>${{$slider->price}}</td>
            <td>{{$slider->link}}</td>
            <td>{{$slider->created_at}}</td>
            <td><a class="btn btn-secondary" href="{{route('admin.editSlider',['slider_id' => $slider->id])}}">Edit</a></td>
            <td><a class="btn btn-danger" href="javascript:void(0)" wire:click.prevent="deleteSlider({{$slider->id}})">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
    
    </table>
    <br>
    <br>

</div>
</div>