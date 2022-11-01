<style>
    .reveal{
    position: relative;
    transform: translateY(150px);
    opacity: 0;
    transition: 1s all ease;
  }
  
  .reveal.active{
    transform: translateY(0);
    opacity: 1;
    animation: downOut 1s ;
  }
.btn-shop {
    border-radius: 5px;
    border: 2px solid #103E3F;
    color: #103E3F;
    text-align: center;
    font-size: 20px;
    padding: 12px;
    width: 230px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
}

.btn-shop span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
}

.btn-shop span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
}

.btn-shop:hover span {
    padding-right: 25px;
}

.btn-shop:hover span:after {
    opacity: 1;
    right: 0;
}
</style>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading shop_header fw-bold " >Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
            etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
        <a href="/blog">
            <button type="button" class="btn-shop item-center text-uppercase"><span>Read our creds</span></button>
        </a>
        <hr>


    </div>

</section>
<div class="">
    <h1 class="jumbotron-heading text-center shop_header fw-bold">Shop By Pattern</h1>
    <div class="album py-5 ">
        <div class="container">

            <div class="row justify-content-md-center">
                @foreach($patterns as $pattern)
                <div class="col-md-4">
                    <div class="card mb-3 box-shadow" style="animation:downOut 2s;">
                        <a href="#" class="text-dark" style="text-decoration: none;">
                            <img src="{{asset('image/digital_4.png')}}" class="card-img-top reveal" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$pattern->name}}</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>

                            </div>
                        </a>
                    </div>
                </div>
                @endforeach  
            </div>
        </div>
    </div>
    <h1 class="jumbotron-heading text-center shop_header fw-bold">Shop By Category</h1>
    <div class="album py-5 ">
        <div class="container">
            <div class="row justify-content-md-center">
                @foreach($categories as $category)
                <div class="col-md-4">
                    <div class="card mb-3 box-shadow reveal">
                        <a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="text-dark" style="text-decoration: none;">
                            <img src="{{asset('image/digital_4.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$category->name}}</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach    
            </div>
        </div>
    </div>
</div>
<script>
    function reveal() {
    var reveals = document.querySelectorAll(".reveal");
  
    for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var elementTop = reveals[i].getBoundingClientRect().top;
      var elementVisible = 150;
  
      if (elementTop < windowHeight - elementVisible) {
        reveals[i].classList.add("active");
      } else {
        reveals[i].classList.remove("active");
      }
    }
  }
  
  window.addEventListener("scroll", reveal);
</script>
@include('livewire/frontend/shop/shopping/shop-css')