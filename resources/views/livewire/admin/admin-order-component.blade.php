<div>
   <div class="container">
   <br>
   <br>
   <br>
    <h1 class="text-center">All Order</h1>
    <br>
    <br>
    <div class="table-responsive">
    <table class="table align-middle">
    <thead class="admin_table">
        <tr>
        <th scope="col">Order Id</th>
        <th scope="col">Subtotal</th>
        <th scope="col">Tax</th>
        <th scope="col">Total</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Mobile</th>
        <th scope="col">Email</th>
        <th scope="col">Zipcode</th>
        <th scope="col">Status</th>
        <th scope="col">Order Date</th>
        <th scope="col">Details</th>
        </tr>
    </thead>
    <tbody>

    @foreach($orders as $order)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <td>${{$order->subtotal}}</td>
            <td>${{$order->tax}}</td>
            <td>${{$order->total}}</td>
            <td>{{$order->firstname}}</td>
            <td>{{$order->lastname}}</td>
            <td>{{$order->mobile}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->zipcode}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->created_at}}</td>
            <td><a class="btn btn_custom" href="{{route('admin.orderDetails',['id'=>$order->id])}}">Details</a></td>
        </tr>
    @endforeach

    </tbody>
    </table>
    {{$orders->links()}}
    </div>
   </div>
   <br>
   <br>
</div>
