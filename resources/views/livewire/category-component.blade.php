<style>
* {
    box-sizing: border-box;
}

.bg-blog {
    font-family: "Times New Roman", Times, serif;
    padding: 20px;
    background: #f1f1f1;
}

/* Header/Blog Title */
/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
    float: left;
    width: 75%;
}

/* Right column */
.rightcolumn {
    float: left;
    width: 25%;
    padding-left: 20px;
}

/* Fake image */
.fakeimg {
    background-color: #aaa;
    width: 100%;
    padding: 20px;
}

/* Add a card effect for articles */
.card {
    background-color: white;
    padding: 20px;
    margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

.btn-toggle-nav a {
    display: inline-flex;
    padding: .1875rem .5rem;
    margin-top: .125rem;
    margin-left: 1.25rem;
    text-decoration: none;
}

.btn-toggle-nav a:hover,
.btn-toggle-nav a:focus {
    background-color: #d2f4ea;
}

/* Footer */
#intro {
    /* Margin to fix overlapping fixed navbar */
    margin-top: 58px;
}

@media (max-width: 991px) {
    #intro {
        /* Margin to fix overlapping fixed navbar */
        margin-top: 45px;
    }
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {

    .leftcolumn,
    .rightcolumn {
        width: 100%;
        padding: 0;
    }
}
</style>
<main class="container pt-5">


    <div class="row">

        <div class="rightcolumn">
            <span class="mb-auto">
                <a href="">Shop/All Product</a>
            </span>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="card">

                <h3 class="headline">
                    Color
                </h3>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_1" value="" checked="">
                    <label for="shop-filter-price_1">Natural Brown</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_2" value="">
                    <label for="shop-filter-price_2">Natural black</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_3" value="">
                    <label for="shop-filter-price_3">Natural grey</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_4" value="specify">
                    <label for="shop-filter-price_4">Jetblack</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_4" value="specify">
                    <label for="shop-filter-price_4">Brown</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_4" value="specify">
                    <label for="shop-filter-price_4">Ombre</label>
                </div>
            </div>
            <div class="card">

                <h3 class="headline">
                    Length (inch)
                </h3>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_1" value="" checked="">
                    <label for="shop-filter-price_1">10" to 15"</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_2" value="">
                    <label for="shop-filter-price_2">15" to 20"</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_3" value="">
                    <label for="shop-filter-price_3">20" to 25"</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_4" value="specify">
                    <label for="shop-filter-price_4">25" to 30"</label>
                </div>
            </div>
            <div class="card">

                <h3 class="headline">
                    Size
                </h3>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_1" value="" checked="">
                    <label for="shop-filter-price_1">Under $25</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_2" value="">
                    <label for="shop-filter-price_2">$25 to $50</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_3" value="">
                    <label for="shop-filter-price_3">$50 to $100</label>
                </div>
                <div class="radio">
                    <input type="radio" name="shop-filter__price" id="shop-filter-price_4" value="specify">
                    <label for="shop-filter-price_4">Other (specify)</label>
                </div>
            </div>
        </div>
        <div class="leftcolumn">
            <ul class="nav justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Category</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item"
                                href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a>
                        </li>
                        @endforeach
                        
                        <li><a class="dropdown-item" href="#!">Customize Order</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Pattern</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Luster</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </li>

            </ul>
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-sm-4">
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
                </div>
                <div class="wrap-pagination-info">
                    {{$products->links()}}
                </div>

            </div>
        </div>

    </div>

</main>