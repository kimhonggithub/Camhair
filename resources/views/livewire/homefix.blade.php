<main>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($slider as $slide)
            <div class="carousel-item {{$slide->id == 1?'active':''}} custom_cur">
                <div class="row align-items-center">
                    <div class="col-6 desc_ban">
                        <h1 class="ban_head">{{$slide->title}}</h1>
                        <p>{{$slide->subtitle}}</p>
                        <h2>${{$slide->price}}</h2>
                        <a type="button" class="btn btn_custom" href="{{$slide->link}}">Buy Now</a>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('image/slider')}}/{{$slide->slider_image}}" class=" w-100 ban_img" alt="...">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="product_type">
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                All Categories
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($categories as $category)
                <li><a class="dropdown-item"
                        href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="p_w50">
            <select name="" class="sort_product" wire:model="sorting">
                <option value="default" selected>Default Sorting</option>
                <option value="date">Sort by NewItem</option>
                <option value="price_desc">Sort by price(High to Low)</option>
                <option value="price">Sort by price(Low to high)</option>
            </select>
        </div>
        <div>
            <select name="" class="sort_product" wire:model="pagesize">
                <option value="16" selected>16 item per page</option>
                <option value="12">12 item per page</option>
                <option value="8">8 item per page</option>
                <option value="20">20 item per page</option>
                <option value="28">28 item per page</option>
            </select>
        </div>
    </div>

    <div class="container">
        <div class="row">

            @foreach($products as $product)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="{{route('product.details',['slug'=>$product->slug])}}">
                            <img class="pic-1" src="{{asset('image')}}/{{$product->image}}">
                        </a>
                        <ul class="social">
                            <li><a href="{{route('product.details',['slug'=>$product->slug])}}" data-tip="Quick View"><i
                                        class="fa fa-search"></i></a></li>
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
                                href="{{route('product.details',['slug'=>$product->slug])}}">{{$product->name}}</a></h3>
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


        </div>
        <div class="wrap-pagination-info">
            {{$products->links()}}
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
    </div>



</main>

<!-- login -->

<div class="container">
        <div class="login_center">
            <form>
               
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="#!">Register</a></p>
                    <p>or sign up with:</p>
                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
  

