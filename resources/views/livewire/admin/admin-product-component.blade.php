<div>

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
<h3 class="text-center">All Products</h3>
<br>

<div class="container">
<a class="btn btn_custom" href="{{route('admin.productsAdd')}}">Add Product</a>
<br>
<br>
    <div class="table-responsive">
    <table class="table align-middle">
    <thead class="admin_table">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Stock</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <th scope="col">Date</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td><img src="{{asset('image')}}/{{$product->image}}" alt="" width="60" height="60"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->stock_status}}</td>
            <td>${{$product->reguler_price}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->created_at}}</td>
            <td><a class="btn btn-secondary" href="{{route('admin.productsEdit',['product_slug' => $product->slug])}}">Edit</a></td>
            <td><a class="btn btn-danger" href="javascript:void(0)" wire:click.prevent="deleteProduct({{$product->id}})">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
    
    </table>
    <div class="wrap-pagination-info">
        {{$products->links()}}
    </div>
    
    </div>
</div>

<br>
<br>
<br>

</div>