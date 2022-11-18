<div class="container-fluid bg-col py-5 ">
    <div class="row px-md-4 mt-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb fs-3">
                <li class="breadcrumb-item "><a href="/shop" class="text-decoration-none">User</a></li>

                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="row d-flex px-md-4 mt-3">
        <div class="col-sm-5">
            <a href="/shop" class="btn btn-secondary lead fw-bolder text-light" style="letter-spacing: 1px;"><i class="fa-solid fa-arrow-left "></i>&nbsp&nbsp Continue Shopping</a>
        </div>
    </div>
    <div class="row px-md-4 px-2 pt-4">
        <div class="container">
            <h1 class="text-center my-4">All Order</h1>
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
                            <th scope="col">Change Status</th>
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
                            <td><a class="btn btn_custom" href="{{route('user.orderdetails',['id'=>$order->id])}}">Details</a></td>
                            <td>
                                
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Change Status
                                        </button>
                                        <ul class="dropdown-menu">
                                          
                                            <li><a class="dropdown-item" href="#" wire:click.prevent="changeorderStatus({{$order->id}},'delivered')">Deliverd</a></li>
                                            <li><a class="dropdown-item" href="#" wire:click.prevent="changeorderStatus({{$order->id}},'canceled')">Cancel</a></li>
                                        </ul>
                                    </div>

                               
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>