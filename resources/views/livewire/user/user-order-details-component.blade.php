<div>
<div class="container">
    <br>
    <br>
    <br>
    @foreach($order as $ordr)
    @if($ordr->user_id == Auth::user()->id)
    <h1 class="text-center">Details Order</h1>
    <br>
    <br>
    @foreach($transactions as $transaction)
        <h5>Order Id: <span class="lo_go">{{$transaction->order_id}}</span></h5>
        <h5>Order Mode: <span class="lo_go">{{$transaction->mode}}</span></h5>
        <h5>Order Status: <span class="lo_go">{{$transaction->status}}</span></h5>
        <h5>Order Date: <span class="lo_go">{{$transaction->created_at}}</span></h5>
        <h5>last See The Order:
            @if($transaction->created_at == $transaction->updated_at)
               <span class="lo_go">Not Seen Yet</span>
            @else   
                <span class="lo_go">{{$transaction->updated_at}}</span>
            @endif
        </h5>
        <br>
        <br>

    @endforeach
    
    <div class="table-responsive">
    <table class="table align-middle">
    <thead class="admin_table">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Image</th>
        <th scope="col">Order Id</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
   
    @foreach($orderdetails as $orderdetail)
        <tr>
            <th scope="row">{{$orderdetail->id}}</th>
            <td><img src="{{asset('image')}}/{{$orderdetail->product->image}}" alt="" width="60" height="60"></td>
            <td>{{$orderdetail->order_id}}</td>
            <td>${{$orderdetail->price}}</td>
            <td>{{$orderdetail->quantity}}</td>
            <td>{{$orderdetail->created_at}}</td>
        </tr>
    @endforeach
    @else
     <h1 class="text-center">Not Your Order</h1>
    @endif
    @endforeach
    </tbody>
    </table>
    <br>
    <br>
    
    </div>
    </div>
</div>
