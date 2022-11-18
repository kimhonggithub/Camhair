@push('style_content')
<!-- <style>
.masthead {
        height: 100vh;
        min-height: 500px;
        background-image: url('https://source.unsplash.com/BtbjCFUvBXs/1920x1080');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        font-family: "Times New Roman", Times, serif;
    }
    </style> -->

<style>
    
.item {
    display: none;
    position: relative;
    transition: (6s ease-in-out left);
}
</style>
@endpush
<div style="font-family: Times New Roman, Times, serif;">


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
            <div class="carousel-item {{$slide->id == 1?'active':''}} custom_cur" data-bs-interval="1900">
                <div class=" bg-dark text-white">
                    <img src="{{asset('image/slider')}}/{{$slide->slider_image}}" style="animation:slideDown  2s ;"
                        class="img"  width="100%" height="650">
                    <div class="row justify-content-center">
                        <div class="card-img-overlay">
                            <div class="desc_ban">

                                <h1 class="text-black display-4 fw-bold px-lg-8 " style="animation: translateX 2s;">
                                    {{$slide->title}}
                                    <!-- text -->
                                    <p class="text-black-30 mb-4 lead fs-5 mt-3 font-bold "
                                        style="animation: translateX 2s;">
                                        {{$slide->subtitle}}
                                    </p>
                                    <h2 class="f-family " style="animation: translateX 1s;">${{$slide->price}}</h2>
                                    <!-- btn -->
                                    <a type="button" href="{{$slide->link}}" class="btn btn-light py-1 px-2 fs-3" style="animation: translateX 2s;">Shop Now</a>

                                    <!-- <a type="button" class="btn btn_custom btn-lg" href="{{$slide->link}}">Buy Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> -->
    </div>
    <div class="bg-light ">
        <div class="container my-12">
            <div class="row align-items-md-stretch">
                <div class="col-md-6 ">
                    <div class="h-100 p-5 text-dark text-center " style="animation:scaleZ 1s;">
                        <h2 class="fs-3 fw-bold text-uppercase lh-sm"> Free Shipping</h2>
                        <p class="fs-4">For all order Over $450, your custom hair extensions will be deliverred to your
                            door at no
                            extra cost. We make it easy for you to reclaim your Virginity.</p>
                        <a href="/shop" class="fs-3 text-uppercase f-shop">Start Shopping</a>
                    </div>
                    <div class="vl"></div>
                </div>

                <div class="col-md-6">
                    <div class="h-100 p-5 text-dark text-center" style="animation:scaleZ 1s;">
                        <h2 class="fs-3 fw-bold text-uppercase lh-sm">Not Lip Service. client Service.</h2>
                        <p class="fs-4">We're here. Whether you've a question before or after <br> you've ordered your
                            extensions, don't hesitate to <br> reach out.</p>
                        <a href="/contact" class="fs-3 text-uppercase f-shop">Email Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

</div>