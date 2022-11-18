<div class="container-fluid bg-col py-5 ">
    <div class="row px-md-4 mt-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb fs-3">
                <li class="breadcrumb-item "><a href="/shop" class="text-decoration-none">User</a></li>
                <li class="breadcrumb-item " aria-current="page"><a href="/user/dashboard" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>
    <div class="row d-flex px-md-4 mt-3">
        <div class="col-sm-5">
            <a href="/shop" class="btn btn-secondary lead fw-bolder text-light" style="letter-spacing: 1px;"><i
                    class="fa-solid fa-arrow-left "></i>&nbsp&nbsp Continue Shopping</a>
        </div>
    </div>
    <div class="row px-md-4 px-2 pt-4">


        <div class="container">
        
            @foreach($order as $ordr)
            @if($ordr->user_id == Auth::user()->id)
            <h1 class="text-center">Details Order</h1>
        
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
                            <td><img src="{{asset('image')}}/{{$orderdetail->product->product_thumbnail}}" alt=""
                                    width="60" height="60"></td>
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
</div>