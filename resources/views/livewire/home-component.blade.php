
<main>
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="row mb-5">
                    <div class="container">
                        <!-- row -->
                        <div class="row align-items-center g-0">
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <!-- heading -->
                                <div class="ms-5">
                                    <h1 class="text-black display-4 fw-bold px-lg-8 ">You will never feel like you're
                                        wearing one!
                                        <!-- text -->
                                        <p class="text-black-30 mb-4 lead fs-5 mt-3 font-bold">
                                            Declaring your beauty is our duty. We offer the best prmium natural wigs,
                                            such
                                            as closure wigs, full-lace wigs and T-closure wigs.
                                        </p>
                                        <!-- btn -->
                                        <!-- <a href="/skincare" class="btn btn-light py-1 px-2 fs-3">Shop Now</a> -->
                                        <a href="/shop">
                                            <button type="button" class="btn-shop item-center "><span>Shop
                                                    now</span></button>
                                        </a>
                                </div>
                            </div>

                            <!-- img -->
                            <div class=" col-xl-6 col-lg-6 col-md-12 text-lg-end text-center pt-6">
                                <img src="{{asset('image/headerpic3.png')}}" height="700" width="600" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container">
            <h2 class="fw-light disc">Discover for you</h2>
            <!-- <div class="row">
                @foreach($products->take(4) as $product)
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                <img class="pic-1" src="{{asset('image')}}/{{$product->image}}">
                            </a>
                            <ul class="social">
                                <li><a href="{{route('product.details',['slug'=>$product->slug])}}"
                                        data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                <li><a href="" data-tip="checkout with cart"
                                        wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><i
                                            class="fas fa-shopping-bag"></i></a></li>
                                <li><a href="" data-tip="Add to Cart"
                                        wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><i
                                            class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            <span class="product-new-label">{{$product->stock_status}}</span>
                            <span class="product-discount-label">{{$product->discount}}%</span>
                        </div>

                        <div class="product-content">
                            <h3 class="title"><a
                                    href="{{route('product.details',['slug'=>$product->slug])}}">{{$product->name}}</a>
                            </h3>
                            <div class="price">${{$product->sale_price}}
                                <span>${{$product->reguler_price}}</span>
                            </div>
                            <a class="add-to-cart" href=""
                                wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">+
                                Add To Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> -->

            <div class="py-5 row row-cols-1 row-cols-md-2 g-4">
               
                @foreach ($categories as $category)
                        <div class="col">
                            <div class="flip-card">
                            <a  href="{{route('product.category',['category_slug'=>$category->slug])}}">
                                <div class="flip-card-inner">
                                
                                    <div class="flip-card-front">
                                        
                                        <img src="{{asset('image/slider/Blend.jpg')}}" alt="Avatar" style="width:300px;height:300px;">
            </div>
                                    
                                    <div class="flip-card-back">
                                        <h1>{{$category->name}}</h1>
                                    </div>
                                    
                                </div>
                                </a>
                            </div>
                        </div>

                    @endforeach
                
            </div>

            <div class="text-center my-5">
                <a href="/shop" class="wrap-see item-center ">
                    <span>See more...
                    </span>
                </a>
            </div>
        </div>

        <div class="col-12 text-center my-5">
            <h1 class="fw-light">Vertically Centered Masthead Content</h1>
            <p class="lead">A great starter layout for a landing page</p>
        </div>

        <div class="container mt-5" style="max-width: 1200px;">
            <div class="row g-0">
                <div class="col-sm-6">
                    <img src="{{asset('image/Factory.JPG')}}" class="card-img" alt="factory">
                </div>
                <div class="col-sm-6 text-center">

                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card-body">
                                    <h5 class="card-title">Card title 1</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card-body">
                                    <h5 class="card-title">Card title 2</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card-body">
                                    <h5 class="card-title">Card title 3</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-5 hover-img text-white tx-5">
            <img src="{{asset('image/5r.png')}}" class="card-img img-5r" alt="...">
            <div class="card-img-overlay ">
                <p class="card-text fs-1 pt-5 pl-4">5 Reasons Why We Have to Wear Hair Extensions</p>
                <a href="/blog" class="middle ">See more...</a>
            </div>
        </div>
        <div class="bannerr container">
            <div>
                <h1 class="bannerr_head">Get Our special discount</h1>
            </div>
            <p class="bannerr_desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis tempora ab
                officia similique maxime quae mollitia labore ratione voluptatibus, laborum voluptas repudiandae
                exercitationem reprehenderit omnis tenetur veniam harum, suscipit, a eius architecto quisquam velit!
                Neque unde ut magni porro similique?</p>
            <div class="email_send">
                <form class="d-flex ">
                    <input class="email_write" type="search" placeholder="Write Email" aria-label="Search">
                    <button class="btn btn_cus" type="submit">Send</button>
                </form>
            </div>
        </div>

    </section>

</main>