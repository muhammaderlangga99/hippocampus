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
    <div class="inline-block m-auto jumbotron mt-14 md:mt-20 md:max-w-7xl mx-3 h-40 md:h-80 rounded-3xl overflow-hidden">
        <div class="swiper mySwiper">

            <div class="swiper-wrapper object-cover m-auto">
                @foreach ($jumbotron->skip(1) as $item)
                    <a href="/product/{{ $item->slug }}"
                        class="inline-block swiper-slide bg-slate-500 group shadow-lg max-w-7xl">
                        <img src="{{ asset('/storage/' . $item->image) }}"
                            class="transition-all duration-200 group-hover:scale-125 group-hover:blur-md w-full object-cover m-auto"
                            alt="">
                        <h2 class="md:text-2xl px-3 font-bold text-white absolute">{{ $item->name }}</h2>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
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
