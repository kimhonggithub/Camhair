
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.order')}}">Orders</a></li>
                       
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-2">
                        
                        <x-search-input wire:model="searchTerm" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                   
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
                                <tbody wire:loading.class="text-muted">

                                    @forelse($orders as $index => $order)
                                    <tr>
                                        <th scope="row">{{$orders->firstItem() + $index }}</th>
                                        
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
                                        <td><a class="btn btn-info" href="{{route('admin.orderDetails',['id'=>$order->id])}}"><i class="fa-solid fa-circle-info"></i>&nbsp; &nbsp; Details</a></td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="12">
                                            <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                                            <p class="mt-2">No results found</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

</div>