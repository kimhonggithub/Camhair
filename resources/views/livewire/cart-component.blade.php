<div class="table-responsive container">
    <table class="table cart_start">
    @if(Session::has('success_massage'))
        <br>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{Session::get('success_massage')}}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    @endif
    @if(Cart::count() > 0)
        <thead class="table_head">
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>
        <tbody>
        @foreach (Cart::content() as $item)
          <tr class="tabale_data">
            <td>
                <div class="cart_product">
                    <img class="cart_pic" src="{{'image'}}/{{$item->model->image}}" alt="{{$item->model->name}}">
                    <div>
                        <h5 class="cart_head">{{$item->model->name}}</h5>
                        <small>Price: ${{$item->subtotal()}}</small><br>
                        <a class="cart_remove" href="" wire:click.prevent="delete_cart_item('{{$item->rowId}}')">Remove</a>
                    </div>
                </div>
            </td>
            <td class="cart_quantity">
                <div class="number-input">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></button>
                <input class="quantity text_green" min="1" name="quantity" value="{{$item->qty}}" type="number">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></button>
            </div>
            </td>
            <td class="cart_quantity">${{$item->subtotal()}}</td>
          </tr>
          @endforeach
          <tr>
              <td></td>
              <td class="cart_head">
                  <h4>Tax-------</h4>
              </td>
              <td class="cart_head">
                  <h4>${{Cart::tax()}}</h4> 
              </td>
          </tr>
          <tr>
              <td></td>
              <td class="cart_head">
                  <h4>Total-------</h4>
              </td>
              <td class="cart_head">
                  <h4>${{Cart::total()}}</h4> 
              </td>
          </tr>
        
        </tbody>
    @else
    <br>
    <div class="alert alert-info" role="alert">
       No Items In Cart!!!
    </div>
    @endif  
    </table>
    @if(Cart::count()>0)
    <a class="checkout btn btn_custom" href="" wire:click.prevent = "checkout()">checkout</a>

    <br>
    <br>
    @endif
</div>
<style>
    .checkout{
        width: 100%;
    }
</style>