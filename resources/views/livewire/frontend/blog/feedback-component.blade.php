<div class="container text-center my-5">
    <h2 class="font-weight-light text-uppercase mb-5" style="color:#d63384;">What our Clients Feedbacks</h2>
    <div class="row mx-auto my-auto justify-content-center" >
        <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" role="listbox">
                @foreach($feedbacks as $feedback)
                <div class="carousel-item {{$feedback->id == 1?'active':''}}" data-bs-interval="2000">
                    <div class="col-md-3">
                        <div class="card ">
                            <div class="card-img">
                                <img src="{{asset('image/feedback')}}/{{$feedback->slider_image}}" alt="" 
                                 height="567px" width="491px">
                            </div>
                            <div class="card-img-overlay">Slide 1</div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
    
</div>

<style>
    @media (max-width: 767px) {
		.carousel-inner .carousel-item > div {
			display: none;
		}
		.carousel-inner .carousel-item > div:first-child {
			display: block;
		}
	}

	.carousel-inner .carousel-item.active,
	.carousel-inner .carousel-item-next,
	.carousel-inner .carousel-item-prev {
		display: flex;
	}

	/* medium and up screens */
	@media (min-width: 768px) {

		.carousel-inner .carousel-item-end.active,
		.carousel-inner .carousel-item-next {
			transform: translateX(25%);
		}

		.carousel-inner .carousel-item-start.active, 
		.carousel-inner .carousel-item-prev {
			transform: translateX(-25%);
		}
	}

	.carousel-inner .carousel-item-end,
	.carousel-inner .carousel-item-start { 
		transform: translateX(0);
	}
</style>

<script>
let items = document.querySelectorAll('.carousel .carousel-item')
items.forEach((el) => {
  const minPerSlide = 3
  let next = el.nextElementSibling
  for (var i=1; i<minPerSlide; i++) {
    if (!next) {
        // wrap carousel by using first child
        next = items[0]
    }
    let cloneChild = next.cloneNode(true)
    el.appendChild(cloneChild.children[0])
    next = next.nextElementSibling
}
})
</script>
