<div>
<br>
<br>
    @if(Cart::count()>0 && Auth::user())
    <h1 class="text-center">Checkout</h1>
        <div class="container">

            <div class="container">
            <br>
            <br>
                <form wire:submit.prevent = "placeOrder">
                
                    <div class="row g-3">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">First Name*</label>
                            <input type="text" class="form-control" placeholder="First name" aria-label="First name" wire:model = "firstname" required>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Last Name*</label>
                            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" wire:model = "lastname" required>
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Email Address*</label>
                            <input type="email" class="form-control" placeholder="Email Address" aria-label="" wire:model = "email" required>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Phone Number*</label>
                            <input type="text" class="form-control" placeholder="Phone Number" aria-label="" wire:model = "mobile" required>
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Adress*</label>
                            <input type="text" class="form-control" placeholder="Details Adress" aria-label="" wire:model = "province" required>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Country*</label>
                            <input type="text" class="form-control" placeholder="Country" aria-label="" wire:model = "country" required>
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Postal/Zip Code*</label>
                            <input type="text" class="form-control" placeholder="Postal/Zip Code" aria-label="" wire:model = "zipcode" required>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Town/City*</label>
                            <input type="text" class="form-control" placeholder="Town/City" aria-label="" wire:model = "city" required>
                        </div>
                    </div>
                    <br>
                    
                    
                

                <div class="checkoout_method" >
                    <label for="" class="form-label">Select Checkout Type</label>
                    <br>
                        <input value="cod" type="radio" wire:model = "payment_method">
                        <span>Cash on Delivery</span>
                        <br>
                        
                        <br>
                        <br>
                        <h4 class="lo_go">Grand Total : {{Cart::total()}}</p>
                    <button type="submit" class="btn btn_custom">Place Order</button>
                </div>

                </form>
            </div>

        </div>
    @else
    <h1 class="text-center">No Items</h1>
    @endif
<br>
<br>
</div>