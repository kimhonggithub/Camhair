<div>
<div class="container details_pr">
        <div class="single_product_img">
            <img class="single_product_img2" src="{{asset('image')}}/{{$detailsProduct->image}}" alt="">
        </div>
        <div class="single_product_desc">
            <h2 class="text_green">{{$detailsProduct->name}}</h2>
            <p><h6 class="text_green">Short Description: </h6>{{$detailsProduct->short_description}}</p>
            <p><h6 class="text_green">Description: </h6>{{$detailsProduct->description}}</p>
            <h3 class="text_green">${{$detailsProduct->sale_price}}</h3>
            <p><span class="text_green">Availability:</span>  {{$detailsProduct->stock_status}}</p>
            
            <br>
            <br>
            <a class="btn btn_custom" wire:click.prevent="store({{$detailsProduct->id}},'{{$detailsProduct->name}}',{{$detailsProduct->sale_price}})"><i class="fas fa-shopping-cart cart_design_ico"></i>Add to cart</a>
        </div>
    </div>

        <div class="container">
                        <br>
                        @foreach($allcomment as $comment)
                        <br>
                        <div class="cart_product">
                        <img class="comment_pic" src="{{asset('image')}}/user.png" alt="">
                        <div class="cmnt">
                            <h5 class="cart_head">{{$comment->username}}</h5>
                            <small>{{$comment->comment}}</small><br>
                            @if(Auth::check())
                                @if(Auth::user()->utype=='ADM')
                                <a class="cart_remove" href="" wire:click.prevent = "deleteComment({{$comment->id}})">Remove</a>
                                @endif
                            @endif
                        </div>
                        </div>
                        @endforeach

                            <br>

                            <br>

                        <form wire:submit.prevent="postComment">
                                    <label for="exampleFormControlTextarea1" class="form-label">Write Your Comment:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="comments"></textarea>
                                   
                                <br>
                                <button type="submit" class="btn btn_custom">Post Comment</button>
                        </form>
                        
                        
        </div>
        
    </div>
    <br>
    
    <div class="container">
        <h4 class="similer_head">Similer Products:</h4>

        <div class="row">
            @foreach ($similer_product as $product_similer)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="{{route('product.details',['slug'=>$product_similer->slug])}}">
                            <img class="pic-1" src="{{asset('image')}}/{{$product_similer->image}}">
                        </a>
                        <ul class="social">
                            <li><a href="{{route('product.details',['slug'=>$product_similer->slug])}}" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="{{route('product.details',['slug'=>$product_similer->slug])}}" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="{{route('product.details',['slug'=>$product_similer->slug])}}" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">{{$product_similer->stock_status}}</span>
                        <span class="product-discount-label">20%</span>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="{{route('product.details',['slug'=>$product_similer->slug])}}">{{$product_similer->name}}</a></h3>
                        <div class="price">${{$product_similer->sale_price}}
                            <span>${{$product_similer->reguler_price}}</span>
                        </div>
                        <a class="add-to-cart" href="{{route('product.details',['slug'=>$product_similer->slug])}}">+ Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div>
    
    
    <div class="details_mar">

    </div>

    </div>