
<br>
<br>
<div class="container">
@if(Session::has('msg'))
        <br>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{Session::get('msg')}}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
@endif
</div>

<br>
<h3 class="text-center">All Categories</h3>
<br>

<div class="container">
<a class="btn btn_custom" href="{{route('admin.categoryAdd')}}">Add Category</a>
<br>
<br>
    <div class="table-responsive">
    <table class="table align-middle">
    <thead class="admin_table">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Category Name</th>
        <th scope="col">Slug</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td><a class="btn btn-secondary" href="{{route('admin.categoryEdit',['category_slug'=>$category->slug])}}">Edit</a></td>
            <td><a class="btn btn-danger" href="{{route('admin.categoryDelete',['category_id'=>$category->id])}}">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
    </table>
    
    </div>
</div>
<br>
<br>
<br>
