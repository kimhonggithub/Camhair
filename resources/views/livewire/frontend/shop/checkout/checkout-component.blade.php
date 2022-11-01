<div class="container-fluid bg-col py-5 ">
    <div class="row px-md-4 mt-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb fs-3">
                <li class="breadcrumb-item "><a href="/shop" class="text-decoration-none">Shop</a></li>
                <li class="breadcrumb-item " aria-current="page"><a href="/cart" class="text-decoration-none">Cart</a>
                </li>
                <li class="breadcrumb-item active">Checkout</li>
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
        
        <div class="col-lg-8">
            <p class="pb-2 fs-3 fw-bold">Your Address</p>
            <div class="card">
                <div class="table-responsive px-md-4 px-2 pt-3 my-2">
                    <div class="checkfont">
                        @if(Cart::count()>0 && Auth::user())
                        <h1 class="text-center">Checkout</h1>
                        <div class="container">
                            <form wire:submit.prevent="placeOrder">
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">First Name</label>
                                        <input type="text" class="form-control" placeholder="First name"
                                            aria-label="First name" wire:model="firstname" required>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last name"
                                            aria-label="Last name" wire:model="lastname" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Email
                                            Address</label>
                                        <input type="email" class="form-control" placeholder="Email Address"
                                            aria-label="" wire:model="email" required>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Phone Number" aria-label=""
                                            wire:model="mobile" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Adress</label>
                                        <input type="text" class="form-control" placeholder="Details Adress"
                                            aria-label="" wire:model="province" required>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Country</label>
                                        <input type="text" class="form-control" placeholder="Country" aria-label=""
                                            wire:model="country" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Postal/Zip
                                            Code</label>
                                        <input type="text" class="form-control" placeholder="Postal/Zip Code"
                                            aria-label="" wire:model="zipcode" required>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputEmail1" class="form-label">Town/City</label>
                                        <input type="text" class="form-control" placeholder="Town/City" aria-label=""
                                            wire:model="city" required>
                                    </div>
                                </div>
                                <div class="checkoout_method ">
                                    <br>
                                    <label for="" class="form-label ">Select Checkout Type</label>
                                    <div class="d-flex ">
                                        <input value="cod" type="radio" wire:model="payment_method">
                                        <span>Cash on Delivery</span>
                                    </div>
                                </div>
                                <button type="submit" class="mt-2 btn btn-outline-info">Place Order</button>
                            </form>
                        </div>
                        @else
                        <h1 class="text-center">No Items</h1>
                        @endif

                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-4 payment-summary">
            <p class="fw-bold pt-lg-0 pt-4 pb-2"></p>
            <div class="card px-md-3 px-2 pt-4">
                <table class="table table-borderless">
                    <thead>
                        <tr class="border-bottom table-danger">
                            <th scope="col">Product</th>
                            <th scope="col"></th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)

                        <tr class="border-bottom">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div> <img class="pic" src="{{'image'}}/{{$item->model->image}}"
                                            alt="{{$item->model->name}}"> </div>
                                </div>
                            </td>
                            <td class="align-middle ">
                                <div class="ps-3 d-flex flex-column justify-content ">
                                    <p class="fw-bold">{{$item->model->name}}</p>
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex ">
                                    <p class="pe-3"><span class="red">{{$item->qty}}</span></p>
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex ">
                                    <p class="pe-3"><span class="text-muted">${{$item->subtotal()}}</span></p>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between py-3"> <small class="text-muted fs-4">Subtotal</small>
                    <p>
                        ${{Cart::subtotal()}}
                    </p>
                </div>
                <div class="d-flex justify-content-between pb-3"> <small class="text-muted fs-4">Taxes</small>
                    <p>${{Cart::tax()}}</p>
                </div>
                <div class="d-flex justify-content-between fw-bolder mb-2"> <small class="text-muted fs-5">Grand Total
                        :</small>
                    <p class="text-success fs-5">${{Cart::total()}}</p>
                </div>
            </div>

        </div>
    </div>
</div>
<style>

.pic {
    width: 70px;
    height: 90px;
    border-radius: 5px
}

.checkfont {
    font-size: 15px;
    font-weight: 500;
    line-height: 1.6;
    letter-spacing: 0.5px;
}
.bg-col{
    background-color: rgba(202, 227, 236, 0.2);
}
</style>