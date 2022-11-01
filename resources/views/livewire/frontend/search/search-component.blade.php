
<main>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active custom_cur">
      <div class="row align-items-center">
              <div class="col-6 desc_ban">
                <h1 class="ban_head">Red Shirt</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas similique quod, iste adipisci, ad ipsam dolor ducimus magni nam, explicabo deleniti. Sit suscipit placeat quibusdam molestiae veniam dolores esse reprehenderit!</p>
                <h2>$120</h2>
                <button type="button" class="btn btn_custom">Buy Now</button>
              </div>
              <div class="col-md-5">
                <img src="image/1.png" class=" w-100 ban_img" alt="...">
             </div>
      </div> 
      </div>
      <div class="carousel-item custom_cur">
      <div class="row align-items-center">
              <div class="col-6 desc_ban">
                <h1 class="ban_head">Red Shirt</h1>
                <p>isci, ad ipsam dolor ducimus magni nam, explicabo deleniti. Sit suscipit placeat quibusdam molestiae veniam dolores esse reprehenderit!</p>
                <h2>$120</h2>
                <button type="button" class="btn btn_custom">Buy Now</button>
              </div>
              <div class="col-md-5">
                <img src="image/1.png" class=" w-100 ban_img" alt="...">
             </div>
      </div>
      </div>
      <div class="carousel-item custom_cur">
      <div class="row align-items-center">
              <div class="col-6 desc_ban">
                <h1 class="ban_head">Red Shirt</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas similique quod, iste adipisci, ad ipsam dolor ducimus magni nam, explicabo deleniti. Sit suscipit placeat quibusdam molestiae veniam dolores esse reprehenderit!</p>
                <h2>$120</h2>
                <button type="button" class="btn btn_custom">Buy Now</button>
              </div>
              <div class="col-md-5">
                <img src="image/1.png" class=" w-100 ban_img" alt="...">
             </div>
      </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="product_type">
  <div class="dropdown">
      <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        All Categories
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      @foreach ($categories as $category)
        <li><a class="dropdown-item" href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a></li>
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
  @if($products->count()>0)
    <div class="row">

        @foreach($products as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="{{route('product.details',['slug'=>$product->slug])}}">
                        <img class="pic-1" src="{{asset('image')}}/{{$product->image}}">
                        
                    </a>
                    <ul class="social">
                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="" data-tip="Add to Cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">{{$product->stock_status}}</span>
                    <span class="product-discount-label">20%</span>
                </div>
                
                <div class="product-content">
                    <h3 class="title"><a href="{{route('product.details',['slug'=>$product->slug])}}">{{$product->name}}</a></h3>
                    <div class="price">${{$product->sale_price}}
                        <span>${{$product->reguler_price}}</span>
                    </div>
                    <a class="add-to-cart" href="" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">+ Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
        
    
    </div>
    @else
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>No item match with your search.</strong> Please Search again properly.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="wrap-pagination-info">
        {{$products->links()}}
    </div>




<div class="bannerr container">
  <div>
    <h1 class="bannerr_head">Get Our special discount</h1>
  </div>
  <p class="bannerr_desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis tempora ab officia similique maxime quae mollitia labore ratione voluptatibus, laborum voluptas repudiandae exercitationem reprehenderit omnis tenetur veniam harum, suscipit, a eius architecto quisquam velit! Neque unde ut magni porro similique?</p>
  <div class="email_send">
    <form class="d-flex ">
      <input class="email_write" type="search" placeholder="Write Email" aria-label="Search">
      <button class="btn btn_cus" type="submit">Send</button>
    </form>
  </div>
</div>


<div class="conn">
  <h5 class="connh1">keep connected with us</h5>
  <div class="conn_ico">
    <i class="fab fa-facebook-f ico_1"></i>
    <i class="connec fab fa-twitter"></i>
    <i class="connec fab fa-linkedin-in"></i>
    <i class="connec fab fa-instagram-square"></i>
  </div>
</div>
</main>