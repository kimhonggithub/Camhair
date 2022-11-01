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
<main class="bg-blog">
    <div class="row">
        <div class="leftcolumn">
            <div class="container">
                <div class="card mb-5">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item fw-bolder fs-4"><a style="text-decoration: none;"
                                        href="/shop">Shop</a></li>
                                <li class="breadcrumb-item fw-bolder fs-4 active">{{$category_name}}</li>
                            </ol>

                        </div>
             
                    </div>

                </div>
                <div class="row">
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


        </div>
        <div class="rightcolumn">
            <div class="card">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="card">
                <div class="row">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select Category</option>
                        <option value="1">Wefted Hair</option>
                        <option value="2">Frontal Hair</option>
                        <option value="3">Closure Hair</option>
                        <option value="4">Wig Hair</option>
                        <option value="5">Blend Hair</option>
                    </select>
                </div>
                <div class="row">
                    <select class="form-select" wire:model="filter_len">
                        <option value="default" selected>Default</option>
                        <option value="10_15">10-15</option>
                        <option value="15_20">15-20</option>
                        <option value="20_25">20-25</option>
                        <option value="25_30">25-30</option>
                    </select>
                </div>
                <div class="row">
                    <select class="form-select">
                        <option selected>Select Luster</option>
                        <option value="1">High</option>
                        <option value="2">Meduim</option>
                        <option value="3">Low</option>
                    </select>
                </div>
                <div class="row">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select Patern</option>
                        <option value="1">Straight</option>
                        <option value="2">Wavy A</option>
                        <option value="3">Wavy B</option>
                        <option value="4">Curly C</option>
                        <option value="5">Curly D</option>
                    </select>
                </div>
                <div class="row">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select Color</option>
                        <option value="1">Jetblack</option>
                        <option value="2">Natural Black</option>
                        <option value="3">Brown</option>
                    </select>
                </div>
            </div>

        </div>
    </div>

</main>
