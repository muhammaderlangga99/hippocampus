<style>
    #article {
        width: 100%;
        height: 100%;
    }

    .link-underline {
        background-image: linear-gradient(to right, #000 0%, #000 100%) !important; // warna garis bawah
        background-size:  !important; // ukuran garis bawah
        background-repeat: no-repeat !important;
        background-position: 0 100% !important;
        background-repeat: no-repeat !important;
        background-position: 0 100% !important;
        background-size: 0 3px !important;
        transition: .5s ease-in-out !important;
    }

    a.card:hover .link-underline {
        background-size: 100% 3px !important;
    }
</style>
<section class="bg-gradient-to-t from-indigo-100 to-blue-100 lg:pt-16 lg:pb-1 py-20 relative font-montserrat">

    <img src="{{ asset('img/Union.png') }}" alt="" class="absolute">
    <div class="max-w-screen-xl px-4 mx-auto space-y-12 lg:space-y-20 lg:px-6 ">
        <!-- Row -->
        <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
            <div class="text-gray-500 sm:text-lg" data-aos="fade-right">
                <p class="text-blue-500 font-medium">Our Product</p>
                <h2 class="mb-2 text-3xl font-extrabold tracking-tight text-gray-900">Provide underwater equipment for
                    various activities</h2>
                <p class="mb-4 lg:text-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis vero
                    illum ipsum id laudantium sunt omnis sequi inventore laboriosam, officia, fuga nam tenetur? Porro,
                    quos.</p>
                <a href="/blog"
                    class="inline-flex items-center justify-center w-full px-4 py-3 mb-6 mr-2 text-sm font-medium bg-blue-700 border border-gray-200 rounded-full sm:w-auto focus:outline-none hover:bg-blue-800 hover:text-slate-50 focus:z-10 focus:ring-4 focus:ring-gray-200 text-white shadow-2xl shadow-blue-500">See
                    detail <i class="bi bi-arrow-right pl-2 animate-next"></i></a>
            </div>
            <!-- Add Navigation -->
            <div class="navigation justify-end space-x-6 self-end hidden lg:flex -translate-y-6">
                <i
                    class="bi bi-arrow-left-circle-fill text-blue-100 text-4xl hover:text-slate-300 active:text-slate-600"></i>
                <i
                    class="bi bi-arrow-right-circle-fill text-blue-100 text-4xl hover:text-slate-300 active:text-slate-600"></i>
            </div>
        </div>
    </div>

    <swiper-container id="article" init="false" class="container max-w-7xl m-auto overflow-x-hidden relative">
        @foreach ($items as $item)
            <swiper-slide class="card group px-3 md:px-0">
                <a href="/tulisan/" class="card inline-block bg-slate-100 rounded-3xl pt-5">
                    <div class="rounded-2xl w-11/12 h-44 overflow-hidden m-auto flex justify-center items-center">
                        <img src="{{ asset('/storage/' . $item->image) }}" alt=""
                            class="object-cover group-hover:scale-125 w-full m-auto thumb bg-white group-hover:shadow-lg  group-hover:shadow-slate-300 transition-all duration-300">
                    </div>
                    <div class="title w-11/12 mt-3 pb-3 m-auto">
                        <h4
                            class="tulisan inline-block text-xl font-semibold font-poppins leading-tight tracking-normal duration-500">
                            <span class="link link-underline link-underline-black">
                                {{ $item->name }} <span class="ml-3 text-xs font-thin m-auto">Disc.
                                    {{ $item->discount }}%</span>
                            </span>
                        </h4>
                        <div class="date flex w-11/12 font-base text-black">
                            <p class="category text-black font-bold rounded-full text-xl">
                                IDR {{ $item->price }}</p>
                            {{-- <p class="font-mono text-xs text-slate-900 font-light my-auto">
                        </p> --}}
                        </div>
                    </div>
                </a>
            </swiper-slide>
        @endforeach
    </swiper-container>



    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script>
        const swiperEl = document.querySelector('#article')
        Object.assign(swiperEl, {
            slidesPerView: 1,
            spaceBetween: 10,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                clickable: true,
            },
            navigation: {
                nextEl: ".bi-arrow-right-circle-fill",
                prevEl: ".bi-arrow-left-circle-fill",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });
        swiperEl.initialize();
    </script>
</section>
