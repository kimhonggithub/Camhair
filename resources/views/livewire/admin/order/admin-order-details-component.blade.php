<div>
    <div class="container">
    <br>
    <br>
    <br>
    <h1 class="text-center">Details Order</h1>
    <br>
    <br>
    @foreach($transactions as $transaction)
        <h5>Order Id: <span class="lo_go">{{$transaction->order_id}}</span></h5>
        <h5>Order Mode: <span class="lo_go">{{$transaction->mode}}</span></h5>
        <h5>Order Status: <span class="lo_go">{{$transaction->status}}</span></h5>
        <h5>Order Date: <span class="lo_go">{{$transaction->created_at}}</span></h5>
        <h5>Change Status: 
            
                <div class="btn-group">
                    <button type="button" class="btn btn_custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Select Status
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" wire:click.prevent = "changeTransactionStatus({{$transaction->id}},'apporved')">Approved</a></li>
                        <li><a class="dropdown-item" href="#" wire:click.prevent = "changeTransactionStatus({{$transaction->id}},'decline')">Decline</a></li>
                        <li><a class="dropdown-item" href="#" wire:click.prevent = "changeTransactionStatus({{$transaction->id}},'refund')">Refund</a></li>
                    </ul>
                </div>
        
        </h5>
    @endforeach
    <br>
    <br>

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
    </tbody>
    </table>
    <br>
    <br>

    </div>
    </div>
</div>
