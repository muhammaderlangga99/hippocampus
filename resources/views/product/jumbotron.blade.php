<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- Demo styles -->
<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<!-- Swiper -->
<section class="flex justify-center font-montserrat">
    <a href="#"
        class="inline-block m-auto jumbotron mt-14 md:mt-20 md:max-w-7xl mx-3 h-40 md:h-80 rounded-3xl overflow-hidden">
        <div class="swiper mySwiper">

            <div class="swiper-wrapper object-cover m-auto">
                <div class="swiper-slide bg-slate-500 group shadow-lg">
                    <img src="{{ asset('img/jumbotron1.jpg') }}"
                        class="transition-all duration-200 group-hover:scale-125 group-hover:blur-md w-full object-cover m-auto"
                        alt="">
                    <h2 class="md:text-2xl px-3 font-bold text-white absolute">Lorem ipsum dolor sit amet.</h2>
                </div>
                <div class="swiper-slide bg-slate-500 group shadow-lg">
                    <img src="{{ asset('img/jumbotron2.jpg') }}"
                        class="transition-all duration-200 group-hover:blur-md group-hover:scale-125 w-full object-cover m-auto"
                        alt="">
                    <h2 class="md:text-2xl px-3 font-bold text-white absolute">Lorem ipsum dolor sit amet.</h2>
                </div>
                <div class="swiper-slide bg-slate-500 group shadow-lg">
                    <img src="{{ asset('img/jumbotron3.jpg') }}"
                        class="transition-all group-hover:blur-md duration-200 group-hover:scale-125 w-full object-cover m-auto"
                        alt="">
                    <h2 class="md:text-2xl px-3 font-bold text-white absolute">Lorem ipsum dolor sit amet.
                    </h2>
                </div>

            </div>
        </div>
    </a>
</section>



<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
</script>
