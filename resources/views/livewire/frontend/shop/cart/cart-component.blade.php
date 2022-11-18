<div class="container my-4">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb fs-3">
            <li class="breadcrumb-item "><a href="/shop" class="text-decoration-none">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>

    <div class="row d-flex">
        <div class="col-sm-5">
            <a href="/shop" class="btn btn-secondary lead fw-bolder text-light" style="letter-spacing: 1px;"><i
                    class="fa-solid fa-arrow-left "></i>&nbsp&nbsp Continue Shopping</a>
        </div>
        <div class="col-auto">
            @if(Session::has('success_massage'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('success_massage')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    @if(Cart::count() > 0)
    <div class="row px-md-4 px-2 pt-4">

        <div class="col-lg-8">
            <p class="pb-2 fw-bold">Product</p>
            <div class="card">
                <div>
                    <div class="table-responsive px-md-4 px-2 pt-3">
                        <table class="table table-borderless">
                            <tbody>
                                @foreach (Cart::content() as $item)
                                <tr class="border-bottom">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div> <img class="pic" src="{{'image'}}/{{$item->model->product_thumbnail}}"
                                                    alt="{{$item->model->name}}"> </div>
                                            <div class="ps-3 d-flex flex-column justify-content">
                                                <p class="fw-bold">{{$item->model->name}}</p>
                                                <small class=" d-flex">
                                                    <span class=" text-muted">Color:</span>
                                                    <span class=" fw-bold">{{$item->model->colors->color_rang}}</span>
                                                </small>
                                                <small class="">
                                                @if(is_null($item->model->sizevalue))
                                                @else
                                                    <span class=" text-muted">Size:</span>
                                                    <span class=" fw-bold">{{$item->model->sizevalue->value_sizes}} </span>
                                                @endif
                                                   
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <p class="pe-3"><span class="red">${{$item->subtotal()}}</span></p>
                                            <!-- <p class="text-muted text-decoration-line-through">$55.00</p> -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center"> <span
                                                class="pe-3 text-muted">Quantity</span><span
                                                class="pe-3 fw-bolder fs-5"><input class="ps-2" type="number"
                                                    value="{{$item->qty}}" aria-label="Disabled input example"
                                                    disabled></span>

                                            <a class="round" href=""
                                                wire:click.prevent="delete_cart_item('{{$item->rowId}}')"><i
                                                    class="fa-solid fa-trash"></i></a>
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
        <div class="col-lg-4 payment-summary">
            <p class="fw-bold pt-lg-0 pt-4 pb-2">Payment Summary</p>
            <div class="card px-md-3 px-2 pt-4">
                <!-- <div class="unregistered mb-4"><span class="py-1">unregistered account</span> </div>
                <div class="d-flex justify-content-between pb-3"> <small class="text-muted">Transaction code</small>
                    <p class="">VC115665</p>
                </div> -->
                <div class="d-flex justify-content-between b-bottom"> <input type="text" class="ps-2"
                        placeholder="COUPON CODE">
                    <div class="btn btn-primary">Apply</div>
                </div>
                <div class="d-flex flex-column ">
                    <div class="d-flex justify-content-between py-3"> <small class="text-muted">Subtotal</small>
                        <p>${{cart::subtotal()}}</p>
                    </div>
                    <div class="d-flex justify-content-between pb-3"> <small class="text-muted">Taxes</small>
                        <p>${{Cart::tax()}}</p>
                    </div>
                    <div class="d-flex justify-content-between fw-bolder mb-2"> <small class="text-muted fs-5">Total
                            Amount</small>
                        <p class=" fs-5">${{Cart::total()}}</p>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <a class="w-100 btn btn-primary btn-lg" wire:click.prevent="checkout()">Continue to checkout</a>
        </div>

    </div>
    @else
    <br>
    <div class="alert alert-info" role="alert">
        No Items In Cart!!!
    </div>
    @endif
</div>
@include("livewire.frontend.shop.cart.cart-css-component")