
<main class="bg-blog">
    <div class="row">
        <div class="leftcolumn">
            <div class="container">
                <div class="card ">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item fw-bolder fs-4"><a style="text-decoration: none;color:black"
                                        href="/shop">Shop</a></li>
                                <li class="breadcrumb-item fw-bolder fs-4">Pattern</li>
                                <li class="breadcrumb-item fw-bolder fs-4 active">{{$pattern_name}}</li>
                            </ol>

                        </div>

                    </div>

                </div>
                <div class="card mb-5">
                    <nav class="nav d-flex justify-content-between">
                        @foreach ($categories as $category)
                        <a class="p-2 fs-5 link-cat"
                            href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a>
                        @endforeach

                    </nav>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-sm-4">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="{{route('product.details',['slug'=>$product->slug])}}">

                                            <img class="pic-1" src="{{asset('image')}}/{{$product->product_thumbnail}}">

                                        </a>
                                        <ul class="social">
                                            <li><a href="{{route('product.details',['slug'=>$product->slug])}}"
                                                    data-tip="Quick View"><i class="fa fa-search"></i></a></li>

                                            <li><a href="" data-tip="Add to Cart"
                                                    wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                        <span class="product-new-label">{{$product->stock_status}}</span>
                                        @if($product->discount == '0')

                                        @else
                                        <span class="product-discount-label">{{$product->discount}}%</span>
                                        @endif
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

            <div class="card">
                <div class="row">
                    <div class="card-header">
                        <h4>Luster</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="d-block">
                            <input type="checkbox" vlaue="Low" />&nbsp;Low
                        </label>
                        <label class="d-block">
                            <input type="checkbox" vlaue="Meduim" />&nbsp;Meduim

                        </label>
                        <label class="d-block">
                            <input type="checkbox" vlaue="High" />&nbsp;High
                        </label>

                    </div>
                </div>
                <div class="row">
                    <div class="card-header">
                        <h4>Colors</h4>
                    </div>
                    <div class="card-body">
                        @foreach($colors as $color)
                        <label class="d-block">
                            <input type="checkbox" vlaue="{{$color->color_rang}}" />&nbsp;{{$color->color_rang}}
                        </label>
                        @endforeach
                    </div>
                </div>
                
                <div class="row">
                    <div class="card-header">
                        <h4>Lenght</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>

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