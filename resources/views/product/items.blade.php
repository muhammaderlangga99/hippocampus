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
<section class="max-w-7xl m-auto font-montserrat mt-10 md:border-b border-slate-300 pb-5">
    <div class="px-3 md:px-0">
        <h2 class="text-3xl font-bold text-slate-800">New Items</h2>
        <div class="grid gap-y-3 grid-cols-2 lg:grid-cols-4 md:grid-cols-3 mt-5">
            <swiper-slide class="card group px-3 md:px-0">
                <a href="/tulisan/" class="card inline-block bg-slate-100 rounded-3xl pt-5">
                    <div class="rounded-2xl w-11/12 h-44 overflow-hidden m-auto flex">
                        <img src="{{ asset('img/baju.jpg') }}" alt=""
                            class="object-cover group-hover:scale-125 w-full m-auto thumb bg-white group-hover:shadow-lg  group-hover:shadow-slate-300 transition-all duration-300">
                    </div>
                    <div class="title w-11/12 mt-3 pb-3 m-auto">
                        <h4
                            class="tulisan inline-block text-base md:text-xl font-semibold font-poppins leading-tight tracking-normal duration-500">
                            <span class="link link-underline link-underline-black text-center md:text-left md:mx-2">
                                Swimsuit diving
                            </span>
                        </h4>
                        <div class="date flex w-11/12 font-base text-black">
                            <p class="category text-black font-bold rounded-full text-base md:text-xl md:mx-2">
                                IDR 1.350.000</p>
                            {{-- <p class="font-mono text-xs text-slate-900 font-light my-auto">
                        </p> --}}
                        </div>
                    </div>
                </a>
            </swiper-slide>
            <swiper-slide class="card group px-3 md:px-0">
                <a href="/tulisan/" class="card inline-block bg-slate-100 rounded-3xl pt-5">
                    <div class="rounded-2xl w-11/12 h-44 overflow-hidden m-auto flex">
                        <img src="{{ asset('img/baju.jpg') }}" alt=""
                            class="object-cover group-hover:scale-125 w-full m-auto thumb bg-white group-hover:shadow-lg  group-hover:shadow-slate-300 transition-all duration-300">
                    </div>
                    <div class="title w-11/12 mt-3 pb-3 m-auto">
                        <h4
                            class="tulisan inline-block text-base md:text-xl font-semibold font-poppins leading-tight tracking-normal duration-500">
                            <span class="link link-underline link-underline-black text-center md:text-left md:mx-2">
                                Swimsuit diving
                            </span>
                        </h4>
                        <div class="date flex w-11/12 font-base text-black">
                            <p class="category text-black font-bold rounded-full text-base md:text-xl md:mx-2">
                                IDR 1.350.000</p>
                            {{-- <p class="font-mono text-xs text-slate-900 font-light my-auto">
                        </p> --}}
                        </div>
                    </div>
                </a>
            </swiper-slide>
            <swiper-slide class="card group px-3 md:px-0">
                <a href="/tulisan/" class="card inline-block bg-slate-100 rounded-3xl pt-5">
                    <div class="rounded-2xl w-11/12 h-44 overflow-hidden m-auto flex">
                        <img src="{{ asset('img/baju.jpg') }}" alt=""
                            class="object-cover group-hover:scale-125 w-full m-auto thumb bg-white group-hover:shadow-lg  group-hover:shadow-slate-300 transition-all duration-300">
                    </div>
                    <div class="title w-11/12 mt-3 pb-3 m-auto">
                        <h4
                            class="tulisan inline-block text-base md:text-xl font-semibold font-poppins leading-tight tracking-normal duration-500">
                            <span class="link link-underline link-underline-black text-center md:text-left md:mx-2">
                                Swimsuit diving
                            </span>
                        </h4>
                        <div class="date flex w-11/12 font-base text-black">
                            <p class="category text-black font-bold rounded-full text-base md:text-xl md:mx-2">
                                IDR 1.350.000</p>
                            {{-- <p class="font-mono text-xs text-slate-900 font-light my-auto">
                        </p> --}}
                        </div>
                    </div>
                </a>
            </swiper-slide>
            <swiper-slide class="card group px-3 md:px-0">
                <a href="/tulisan/" class="card inline-block bg-slate-100 rounded-3xl pt-5">
                    <div class="rounded-2xl w-11/12 h-44 overflow-hidden m-auto flex">
                        <img src="{{ asset('img/baju.jpg') }}" alt=""
                            class="object-cover group-hover:scale-125 w-full m-auto thumb bg-white group-hover:shadow-lg  group-hover:shadow-slate-300 transition-all duration-300">
                    </div>
                    <div class="title w-11/12 mt-3 pb-3 m-auto">
                        <h4
                            class="tulisan inline-block text-base md:text-xl font-semibold font-poppins leading-tight tracking-normal duration-500">
                            <span class="link link-underline link-underline-black text-center md:text-left md:mx-2">
                                Swimsuit diving
                            </span>
                        </h4>
                        <div class="date flex w-11/12 font-base text-black">
                            <p class="category text-black font-bold rounded-full text-base md:text-xl md:mx-2">
                                IDR 1.350.000</p>
                            {{-- <p class="font-mono text-xs text-slate-900 font-light my-auto">
                        </p> --}}
                        </div>
                    </div>
                </a>
            </swiper-slide>
        </div>
    </div>
</section>
