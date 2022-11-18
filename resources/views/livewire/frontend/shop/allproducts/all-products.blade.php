<main class="container">
    <div class="container">
        <h3 class="fst-italic ">
            Select Category
        </h3>
        <div class="nav-scroller py-1 mb-2 ">

            <nav class="nav d-flex justify-content-between">
                @foreach ($categories as $category)
                <a class="p-2 fs-5 link-cat"
                    href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a>
                @endforeach

            </nav>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-light rounded">
                    <form action="{{route('search.product')}}" class="d-flex" method="GET">
                        <input name="search" class="form-control me-2" type="search" placeholder="Search"
                            aria-label="Search">
                        <button name="submit" class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="p-4">
                    <select class="form-select" aria-label="Default select example" wire:model="pagesize">
                        <option value="16" selected>16 item per page</option>
                        <option value="12">12 item per page</option>
                        <option value="8">8 item per page</option>
                        <option value="20">20 item per page</option>
                        <option value="28">28 item per page</option>
                    </select>
                </div>
                <div class="p-4">
                    <select class="form-select" aria-label="Default select example" wire:model="sorting">
                        <option value="default" selected>Default Sorting</option>
                        <option value="date">Sort by NewItem</option>
                        <option value="price_desc">Sort by price(High to Low)</option>
                        <option value="price">Sort by price(Low to high)</option>
                    </select>
                </div>
                <div class="p-4">
                    <select class="form-select" aria-label="Default select example" wire:model="sorting">
                        <option value="default" selected>Pattern</option>
                        @foreach ($patterns as $pattern)
                        <option value="{{$pattern->name}}">{{$pattern->name}}</option>
                        @endforeach
                        
                    </select>
                </div>


            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach($products as $product)
                <div class="col-xl-6 ">
                    <div class="product-grid">
                        <div class="product-image ">
                            <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                <img class="pic-1" src="{{asset('image')}}/{{$product->product_thumbnail}}">
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

</main>


<style>
a.link-cat {
    box-shadow: inset 0 0 0 0 #54b3d6;
    color: black;
    margin: 0 -.25rem;
    padding: 0 .25rem;
    transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
    text-decoration: none;
}

a.link-cat:hover {
    box-shadow: inset 100px 0 0 0 #F7A4A4;
    color: white;
    font-weight: 200;

}

.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}

.b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
}

.bi {
    vertical-align: -.125em;
    fill: currentColor;
}

.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}

.nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}
</style>


<!-- <main>
    <div class="mx-5">
    <form action="{{route('search.product')}}" class="d-flex" method="GET">
                <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button name="submit" class="btn btn-outline-success" type="submit">Search</button>
            </form>
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
                            <img class="pic-1" src="{{asset('image')}}/{{$product->product_thumbnail}}">
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
    </div>
</main> -->