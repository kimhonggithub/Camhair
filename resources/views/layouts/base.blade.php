<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="{{mix('css/custom.css')}}">
    @stack('style_content')
    <livewire:styles />
    <title>Cambodian Hair Extensions</title>
</head>
<body>
    
    <!-- Navbar -->
    @include('layouts.user_partials.navigation')
    <!-- /.navbar -->
    <div class="clear">
    </div>
    <div class="content">
        {{$slot}}
        
    </div>
    
    @include('layouts.user_partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>




    <script>
    document.addEventListener("DOMContentLoaded", function() {

        el_autohide = document.querySelector('.smart-scroll');

        // add padding-top to bady (if necessary)
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';

        if (el_autohide) {
            var last_scroll_top = 0;
            window.addEventListener('scroll', function() {
                let scroll_top = window.scrollY;
                if (scroll_top < last_scroll_top) {
                    el_autohide.classList.remove('scrolled-down');
                    el_autohide.classList.add('scrolled-up');
                } else {
                    el_autohide.classList.remove('scrolled-up');
                    el_autohide.classList.add('scrolled-down');
                }
                last_scroll_top = scroll_top;
            });
            // window.addEventListener
        }
        // if

    });
    $(document).ready(function() {
        $("#sidebarCollapse").on('click', function() {
            $("#sidebar").toggleClass('active');
        });
    });


    // For Filters
    document.addEventListener("DOMContentLoaded", function() {
        var filterBtn = document.getElementById('filter-btn');
        var btnTxt = document.getElementById('btn-txt');
        var filterAngle = document.getElementById('filter-angle');

        $('#filterbar').collapse(false);
        var count = 0,
            count2 = 0;

        function changeBtnTxt() {
            $('#filterbar').collapse(true);
            count++;
            if (count % 2 != 0) {
                filterAngle.classList.add("fa-angle-right");
                btnTxt.innerText = "show filters"
                filterBtn.style.backgroundColor = "#36a31b";
            } else {
                filterAngle.classList.remove("fa-angle-right")
                btnTxt.innerText = "hide filters"
                filterBtn.style.backgroundColor = "#ff935d";
            }

        }

        // For Applying Filters
        $('#inner-box').collapse(false);
        $('#inner-box2').collapse(false);

        // For changing NavBar-Toggler-Icon
        var icon = document.getElementById('icon');

        function chnageIcon() {
            count2++;
            if (count2 % 2 != 0) {
                icon.innerText = "";
                icon.innerHTML = '<span class="far fa-times-circle" style="width:100%"></span>';
                icon.style.paddingTop = "5px";
                icon.style.paddingBottom = "5px";
                icon.style.fontSize = "1.8rem";


            } else {
                icon.innerText = "";
                icon.innerHTML = '<span class="navbar-toggler-icon"></span>';
                icon.style.paddingTop = "5px";
                icon.style.paddingBottom = "5px";
                icon.style.fontSize = "1.2rem";
            }
        }

        // Showing tooltip for AVAILABLE COLORS
        $(function() {
            $('[data-tooltip="tooltip"]').tooltip()
        })

        // For Range Sliders
        var inputLeft = document.getElementById("input-left");
        var inputRight = document.getElementById("input-right");

        var thumbLeft = document.querySelector(".slider > .thumb.left");
        var thumbRight = document.querySelector(".slider > .thumb.right");
        var range = document.querySelector(".slider > .range");

        var amountLeft = document.getElementById('amount-left')
        var amountRight = document.getElementById('amount-right')

        function setLeftValue() {
            var _this = inputLeft,
                min = parseInt(_this.min),
                max = parseInt(_this.max);

            _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);

            var percent = ((_this.value - min) / (max - min)) * 100;

            thumbLeft.style.left = percent + "%";
            range.style.left = percent + "%";
            amountLeft.innerText = parseInt(percent * 100);
        }
        setLeftValue();

        function setRightValue() {
            var _this = inputRight,
                min = parseInt(_this.min),
                max = parseInt(_this.max);

            _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

            var percent = ((_this.value - min) / (max - min)) * 100;

            amountRight.innerText = parseInt(percent * 100);
            thumbRight.style.right = (100 - percent) + "%";
            range.style.right = (100 - percent) + "%";
        }
        setRightValue();

        inputLeft.addEventListener("input", setLeftValue);
        inputRight.addEventListener("input", setRightValue);

        inputLeft.addEventListener("mouseover", function() {
            thumbLeft.classList.add("hover");
        });
        inputLeft.addEventListener("mouseout", function() {
            thumbLeft.classList.remove("hover");
        });
        inputLeft.addEventListener("mousedown", function() {
            thumbLeft.classList.add("active");
        });
        inputLeft.addEventListener("mouseup", function() {
            thumbLeft.classList.remove("active");
        });

        inputRight.addEventListener("mouseover", function() {
            thumbRight.classList.add("hover");
        });
        inputRight.addEventListener("mouseout", function() {
            thumbRight.classList.remove("hover");
        });
        inputRight.addEventListener("mousedown", function() {
            thumbRight.classList.add("active");
        });
        inputRight.addEventListener("mouseup", function() {
            thumbRight.classList.remove("active");
        });
    });
    </script>
    @livewireScripts
</body>

</html>