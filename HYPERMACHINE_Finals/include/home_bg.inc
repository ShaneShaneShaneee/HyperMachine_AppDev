<style>
    .carousel {
        z-index: -99;
    }

    .carousel .carousel-item {
        position: fixed; 
        width: 100%; height: 100%;
        -webkit-transition: opacity 1s;
        -moz-transition: opacity 1s;
        -ms-transition: opacity 1s;
        -o-transition: opacity 1s;
        transition: opacity 1s;
    }

    .carousel .bg {
        background-position: center center;
        background-size: cover;
        -moz-background-size: cover;
    }
    
    .carousel .one {
        background-image: url("img/bg_home1.png");
    }

    .carousel .two {
        background-image: url("img/bg_home2.png");
    }

    .carousel .three {
        background-image: url("img/bg_home3.png");
    }

    .carousel .four {
        background-image: url("img/bg_home4.png");
    }

    .carousel .five {
        background-image: url("img/bg_home5.png");
    }

    .carousel .six {
        background-image: url("img/bg_home6.png");
    }

    .carousel .seven {
        background-image: url("img/bg_home7.png");
    }

    .carousel .eight {
        background-image: url("img/bg_home8.png");
    }
</style>

<div id="bg-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item bg one active" data-bs-interval="10000"></div>
    <div class="carousel-item bg two" data-bs-interval="20000"></div>
    <div class="carousel-item bg three" data-bs-interval="20000"></div>
    <div class="carousel-item bg four" data-bs-interval="20000"></div>
    <div class="carousel-item bg five" data-bs-interval="20000"></div>
    <div class="carousel-item bg six" data-bs-interval="20000"></div>
    <div class="carousel-item bg seven" data-bs-interval="20000"></div>
    <div class="carousel-item bg eight" data-bs-interval="20000"></div>
  </div>
</div>