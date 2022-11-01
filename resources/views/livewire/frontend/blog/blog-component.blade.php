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
    <!-- 
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
    </div> -->
    <div class="row">
        <div class="leftcolumn">
            <div class="card">
                <h2>TITLE HEADING</h2>
                <h5>Title description, Dec 7, 2017</h5>
                <div class="fakeimg" style="height:200px;">Image</div>
                <p>Some text..</p>
            </div>
            <div class="card">
                <!--Section: Content-->
                <section class="text-center">
                    <h4 class="mb-5"><strong>Latest posts</strong></h4>

                    <div class="row">
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Post title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk
                                        of the
                                        card's content.
                                    </p>
                                    <a href="#!" class="btn btn-primary">Read</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/023.jpg"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Post title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk
                                        of the
                                        card's content.
                                    </p>
                                    <a href="#!" class="btn btn-primary">Read</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Post title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk
                                        of the
                                        card's content.
                                    </p>
                                    <a href="#!" class="btn btn-primary">Read</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/002.jpg"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Post title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk
                                        of the
                                        card's content.
                                    </p>
                                    <a href="#!" class="btn btn-primary">Read</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/022.jpg"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Post title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk
                                        of the
                                        card's content.
                                    </p>
                                    <a href="#!" class="btn btn-primary">Read</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="https://mdbootstrap.com/img/new/standard/nature/035.jpg"
                                        class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Post title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk
                                        of the
                                        card's content.
                                    </p>
                                    <a href="#!" class="btn btn-primary">Read</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Section: Content-->

                <!-- Pagination -->
                <!-- <nav class="my-4" aria-label="...">
                    <ul class="pagination pagination-circle justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav> -->
            </div>
        </div>
        <div class="rightcolumn">
            <div class="card">
                <h2>About Me</h2>
                <div class="fakeimg" style="height:100px;">Image</div>
                <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
            </div>
            <div class="card">
                <h3>Popular Post</h3>
                <div class="fakeimg">Image</div><br>
                <div class="fakeimg">Image</div><br>
                <div class="fakeimg">Image</div>
            </div>
            <div class="card">
                <h3>Follow Me</h3>
                <p>Some text..</p>
            </div>
        </div>
    </div>

</main>