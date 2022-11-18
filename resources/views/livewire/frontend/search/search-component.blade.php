<main class="bg-blog">
    <div class="row">
        <div class="leftcolumn">
            <div class="container">
                <div class="card mb-5">
                    <nav class="nav d-flex justify-content-between">
                        @foreach ($categories as $category)
                        <a class="p-2 fs-5 link-cat"
                            href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a>
                        @endforeach

                    </nav>
                </div>
                <div class="container">
                    @if($products->count()>0)
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <img class="pic-1" src="{{asset('image')}}/{{$product->product_thumbnail}}">

                                    </a>
                                    <ul class="social">
                                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a>
                                        </li>
                                        <li><a href="" data-tip="Add to Cart"
                                                wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><i
                                                    class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">{{$product->stock_status}}</span>
                                    <span class="product-discount-label">20%</span>
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
                    @else

                    <div class="alert alert-warning alert-dismissible fade show rounded-8 shadow" role="alert">

                        <div class="modal-body py-0">
                            <strong>No item match with your search.</strong> Please Search again properly.
                        </div>
                        <div class="modal-footer flex-column border-top-0">
                            <a type="button" href="/customize/order" class="btn btn-lg btn-secondary w-100 mx-0 mb-2">Custom
                                Order</a>
                           
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>

                        </div>
                    </div>
                    @endif
                    <div class="wrap-pagination-info">
                        {{$products->links()}}
                    </div>
                </div>

            </div>
        </div>
        <div class="rightcolumn">
            <div class="card">
                <form action="{{route('search.product')}}" class="d-flex" method="GET">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search">
                    <button name="submit" class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Select Item per page</h4>
                </div>
                <select class="form-select" aria-label="Default select example" wire:model="pagesize">
                    <option value="16" selected>16 item per page</option>
                    <option value="12">12 item per page</option>
                    <option value="8">8 item per page</option>
                    <option value="20">20 item per page</option>
                    <option value="28">28 item per page</option>
                </select>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Sort Products</h4>
                </div>
                <select class="form-select" aria-label="Default select example" wire:model="sorting">
                    <option value="default" selected>Default Sorting</option>
                    <option value="date">Sort by NewItem</option>
                    <option value="price_desc">Sort by price(High to Low)</option>
                    <option value="price">Sort by price(Low to high)</option>
                </select>

            </div>
        </div>
    </div>

</main>
<style>
* {
    box-sizing: border-box;
}

.bg-blog {
    font-family: "Times New Roman", Times, serif;
    padding: 20px;
    background: #f1f1f1;
}

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