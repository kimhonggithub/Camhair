<div >
    <div class="container my-5 ">
        <div class="card">
            <div class="row g-0">
                <div class="col-lg-6 border-end">
                    <div class="p-3 d-flex flex-column justify-content-center">
                        <div class="main_image">
                            <img src="{{asset('image')}}/{{$detailsProduct->image}}" id="main_product_image"
                                height="100%">
                        </div>
                        <div class="thumbnail_images">
                            <ul id="thumbnail">
                                <li><img onclick="changeImage(this)" src="" width="70"></li>
                                <li><img onclick="changeImage(this)" src="https://i.imgur.com/w6kEctd.jpg" width="70">
                                </li>
                                <li><img onclick="changeImage(this)" src="https://i.imgur.com/L7hFD8X.jpg" width="70">
                                </li>
                                <li><img onclick="changeImage(this)" src="https://i.imgur.com/6ZufmNS.jpg" width="70">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="fs-1">{{$detailsProduct->name}}</p>
                            <a href="{{url()->previous()}}" style="text-decoration: none;"><span class="heart"><i
                                        class="fa-solid fa-arrow-left-long"></i></span></a>

                        </div>
                        <div class="fs-5 mb-3">
                            Avalablity : <span class="text-success fw-bolder">{{$detailsProduct->stock_status}}</span>
                        </div>

                        <!-- <h3 class="fw-bolder"></h3> -->
                        <!-- <div class="ratings d-flex flex-row align-items-center">
                            <span>441 reviews</span>
                        </div> -->
                        <table class="table ">
                            <thead>
                                <tr class="text-uppercase table-dark text-center">
                                    <th scope="col">Pattern</th>
                                    <th scope="col">Luster</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Lenght</th>
                                    <th scope="col">Price</th>

                                </tr>
                            </thead>

                            <tbody>
                                <tr class="text-uppercase table-active text-center">
                                    <td class="fs-5">{{$detailsProduct->patterns->name}}</td>
                                    <td class="fs-5">{{$detailsProduct->Luster}}</td>
                                    <td class="fs-5">{{$detailsProduct->Colors->color_rang}}</td>
                                    <td class="fs-5">{{$detailsProduct->Lenght}}"</td>
                                    <td class="fw-bolder fs-5">${{$detailsProduct->sale_price}}</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="buttons d-flex flex-row mt-5 gap-3">
                            <button wire:click.prevent="checkout()" class="btn btn-outline-dark">Buy
                                Now</button>
                            <button
                                wire:click.prevent="store({{$detailsProduct->id}},'{{$detailsProduct->name}}',{{$detailsProduct->sale_price}})"
                                class="btn btn-dark"><i class="fas fa-shopping-cart cart_design_ico"></i>Add to
                                Basket</button>

                        </div>
                        <!-- <div class="accordion accordion-flush" style="cursor: pointer;" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <a class="accordion-button collapsed text-dark text-uppercase text-decoration-none border-bottom border-2 "
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Description
                                    </a>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>{{$detailsProduct->description}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div> -->






                        <!-- <div class="mt-3 pr-3 content ">
                            <h6 class="text_green fw-bolder fs-4">Short description:</h6>
                            <p><p >{{$detailsProduct->short_description}}</p></p>
                            <h6 class="text_green fw-bolder fs-4">Description:</h6>
                            {{$detailsProduct->description}}</p>
                        </div>
                        <div class="fs-5">
                            Avalablity : <span class="text-success fw-bolder">{{$detailsProduct->stock_status}}</span>
                        </div>
                        <div class="mt-2"> <span class="fw-bold">Color</span>
                            <div class="colors">
                                <ul id="marker">
                                    <li id="marker-1"></li>
                                    <li id="marker-2"></li>
                                    <li id="marker-3"></li>
                                    <li id="marker-4"></li>
                                    <li id="marker-5"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="buttons d-flex flex-row mt-5 gap-3">
                            <button wire:click.prevent = "checkout()" class="btn btn-outline-dark">Buy
                                Now</button>
                            <button
                                wire:click.prevent="store({{$detailsProduct->id}},'{{$detailsProduct->name}}',{{$detailsProduct->sale_price}})"
                                class="btn btn-dark"><i class="fas fa-shopping-cart cart_design_ico"></i>Add to
                                Basket</button>

                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card p-5">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                        aria-selected="false">Profile</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                    aria-labelledby="nav-profile-tab" tabindex="0"> {{$detailsProduct->description}}</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                    tabindex="0">
                    <div class="row p-5">


                        @foreach($allcomment as $comment)

                        <div class="cart_product">
                            <img class="comment_pic" src="{{asset('image')}}/user.png" alt="">
                            <div class="cmnt">
                                <h5 class="cart_head">{{$comment->username}}</h5>
                                <small>{{$comment->comment}}</small><br>
                                @if(Auth::check())
                                @if(Auth::user()->utype=='ADM')
                                <a class="cart_remove" href=""
                                    wire:click.prevent="deleteComment({{$comment->id}})">Remove</a>
                                @endif
                                @endif
                            </div>
                        </div>
                        @endforeach

                        <br>

                        <br>

                        <form wire:submit.prevent="postComment">
                            <label for="exampleFormControlTextarea1" class="form-label">Write Your Comment:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                wire:model="comments"></textarea>

                            <br>
                            <button type="submit" class="btn btn_custom">Post Comment</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <!-- <h4 class="similer_head">Similer Products:</h4> -->
        <h4 class="fs-3 text-center my-5 text-uppercase fw-bolder text-success">Related products</h4>
        <div class="row">
            @foreach ($similer_product as $product_similer)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="{{route('product.details',['slug'=>$product_similer->slug])}}">
                            <img class="pic-1" src="{{asset('image')}}/{{$product_similer->image}}">
                        </a>
                        <ul class="social">
                            <li><a href="{{route('product.details',['slug'=>$product_similer->slug])}}"
                                    data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                            <li><a href="{{route('product.details',['slug'=>$product_similer->slug])}}"
                                    data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="{{route('product.details',['slug'=>$product_similer->slug])}}"
                                    data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">{{$product_similer->stock_status}}</span>
                        <span class="product-discount-label">20%</span>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a
                                href="{{route('product.details',['slug'=>$product_similer->slug])}}">{{$product_similer->name}}</a>
                        </h3>
                        <div class="price">${{$product_similer->sale_price}}
                            <span>${{$product_similer->reguler_price}}</span>
                        </div>
                        <a class="add-to-cart" href="{{route('product.details',['slug'=>$product_similer->slug])}}">+
                            Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    overflow: hidden;
    box-shadow: 0 2px 20px -5px rgba(0, 0, 0, 0.5);
}

.thumbnail_images ul {
    list-style: none;
    justify-content: center;
    display: flex;
    align-items: center;
    margin-top: 10px
}

.thumbnail_images ul li {
    margin: 5px;
    padding: 10px;
    border: 2px solid #eee;
    cursor: pointer;
    transition: all 0.5s
}

.thumbnail_images ul li:hover {
    border: 2px solid #000
}

.main_image {
    display: flex;
    justify-content: center;
    align-items: center;
    border-bottom: 1px solid #eee;
    height: 400px;
    width: 100%;
    overflow: hidden
}

.heart {
    height: 29px;
    width: 29px;
    background-color: #eaeaea;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all .2s ease-in-out;
}

/* .nav .nav-item>a {
    text-decoration: none;
    color: #103E3F;
    letter-spacing: 1px;
}

.nav .nav-item>a.active,
.nav .nav-item>a:hover,
.nav .nav-item>a:focus {
    color: red;
    border-bottom: #263f55 2px solid;
    color: #ff284c76;

} */

.heart:hover {
    transform: scale(1.5);
    cursor: pointer;
}

.content p {
    font-size: 12px
}

.ratings span {
    font-size: 14px;
    margin-left: 12px
}

.colors {
    margin-top: 5px
}

.colors ul {
    list-style: none;
    display: flex;
    padding-left: 0px
}

.colors ul li {
    height: 20px;
    width: 20px;
    display: flex;
    border-radius: 50%;
    margin-right: 10px;
    cursor: pointer
}

.colors ul li:nth-child(1) {
    background-color: #6c704d
}

.colors ul li:nth-child(2) {
    background-color: #96918b
}

.colors ul li:nth-child(3) {
    background-color: #68778e
}

.colors ul li:nth-child(4) {
    background-color: #263f55
}

.colors ul li:nth-child(5) {
    background-color: black
}

.right-side {
    position: relative
}

.buttons .btn {
    height: 50px;
    width: 150px;
    border-radius: 0px !important
}
</style>
<script>
function changeImage(element) {

    var main_prodcut_image = document.getElementById('main_product_image');
    main_prodcut_image.src = element.src;

}

// $("nav.nav > button.nav-link").click(function() {
//     $("nav.nav").removeClass("active");
//     $(this).addClass("active");
//     $("nav.nav > button.nav-link").removeClass("show active");
//     $(this).addClass("show active");
// });
</script>