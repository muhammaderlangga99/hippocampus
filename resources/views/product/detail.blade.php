@extends('main')

@section('content')
    <style>
        p {
            margin-bottom: 20px;
        }

        /* image zoom */
        figure.zoom {
            cursor: zoom-in;
        }

        figure.zoom img:hover {
            opacity: 0;
        }

        figure.zoom img {
            transition: opacity 0.5s;
            display: block;
            width: 100%;
        }

        a {
            display: inline-block !important;
        }

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

    <body class="px-3">
        <section class="detail m-auto max-w-7xl mt-8 bg-slate-50 border border-slate-200 rounded-2xl font-montserrat">
            <div class="grid px-4 py-4 md:grid-cols-5 md:space-x-10">
                <div class="col-span-5 md:col-span-2">
                    @if ($item->image == Storage::exists($item->image))
                        <figure class="img rounded-2xl overflow-hidden flex zoom" onmousemove="zoom(event)"
                            style="background-image: url({{ asset('storage/' . $item->image) }})">
                            <img src="{{ asset('storage/' . $item->image) }}" class="m-auto w-full" alt="">
                        </figure>
                    @else
                        <figure class="img rounded-2xl overflow-hidden flex zoom" onmousemove="zoom(event)"
                            style="background-image: url({{ asset('img/hippocampuss.png') }})">
                            <img src="{{ asset('img/hippocampuss.png') }}" class="m-auto w-full" alt="">
                        </figure>
                    @endif

                    <div class="toko flex gap-4">
                        <div class="whatsapp">
                            <a href="https://api.whatsapp.com/send?phone=628111776569&text=Haii%20saya%20tertarik%20untuk%20order%20{{ $item->name }}"
                                target="_blank"
                                class="bg-green-50 border border-green-500 text-green-800 font-medium hover:bg-green-100 text-sm rounded-full px-4 py-2 inline-block mt-3"><i
                                    class="bi bi-whatsapp"></i> <span class="hidden lg:inline">whatsapp</span></a>
                        </div>
                        <div class="whatsapp">
                            <a href="{{ $item->link }}" target="_blank"
                                class="bg-green-50 border border-green-500 text-green-800 font-medium hover:bg-green-100 text-sm rounded-full px-4 py-2 inline-block mt-3">
                                <img src="{{ asset('img/tokopedia.png') }}" class="w-5 inline-block mr-1" alt="">
                                <span class="md:inline-block">buy on tokopedia</span>
                            </a>
                        </div>
                    </div>
                    <p class="preorder p-3 bg-blue-700 mt-4 text-white font-medium text-center rounded-b-2xl">Pre Order
                    </p>
                </div>

                <div class="col-span-5 md:col-span-3 m-auto">
                    <div class="detail w-full">
                        <h1 class="text-3xl font-bold text-slate-900">{{ $item->name }}</h1>
                        <p class="text-sm text-slate-500 mt-2">Category: <a href="/category/{{ $item->categori->slug }}"
                                class="text-blue-700 font-medium">{{ $item->categori->name }}</a></p>
                        <p class="text-sm text-slate-500 mt-2">Brand: Hippocampus Indonesia</p>
                        <p class="text-sm text-slate-500 mt-2">Condition: New</p>
                        <p class="text-sm text-slate-500 mt-2">Stock: Full</p>
                        <p class="text-sm text-slate-500 mt-2 space-x-2">Price:
                            @if ($item->discount > 0)
                                <span class="line-through">
                                    IDR {{ number_format($item->price, 0, ',', '.') }}
                                </span>
                                <span
                                    class="discount p-2 text-blue-500 bg-blue-100 rounded-2xl text-base font-medium">{{ $item->discount }}%</span>
                            @endif
                            <span class="font-medium text-lg text-slate-700">IDR
                                {{ number_format($item->after_discount, 0, ',', '.') }}</span>
                        </p>
                        <div class="toko flex gap-4 my-7">
                            <div class="whatsapp">
                                <a href="https://api.whatsapp.com/send?phone=628111776569&text=Haii%20saya%20tertarik%20untuk%20order%20{{ $item->name }}"
                                    target="_blank"
                                    class="bg-green-50 text-green-800 font-medium hover:bg-green-100 text-sm md:text-lg  rounded-full px-4 py-2 inline-block mt-3"><i
                                        class="bi bi-whatsapp mr-1"></i>
                                    Whatsapp</a>
                            </div>
                            <div class="whatsapp">
                                <a href="{{ $item->link }}" target="_blank"
                                    class="bg-green-50 border text-xs md:text-lg border-green-500 text-green-800 font-medium hover:bg-green-100 rounded-full px-4 py-2 inline-block mt-3">
                                    <img src="{{ asset('img/tokopedia.png') }}" class="w-6 inline-block mr-1"
                                        alt="">
                                    Tokopedia</a>
                            </div>
                        </div>
                        <div
                            class="text-sm mt-3 text-slate-500 bg-slate-100 p-2 border border-slate-300 rounded-2xl font-medium">
                            Description:
                            <p>{!! $item->description !!}</p>
                        </div>
                        <p class="text-xs font-medium text-slate-500 mt-5"><i class="bi bi-geo-alt-fill"></i> Ships from:
                            Kota Depok</p>
                    </div>
                </div>
        </section>

        <div class="flex m-auto justify-between max-w-7xl mt-16 mb-8 px-3 md:px-0 font-montserrat items-center">
            <h3 class="text-3xl font-bold text-slate-800">Maybe you
                like
            </h3>

            <a href="/category/{{ $item->categori->slug }}" class="text-lg font-medium text-blue-600">See all</a>
        </div>

        <swiper-container id="article" init="false"
            class="font-montserrat container max-w-7xl m-auto overflow-x-hidden relative">
            @if ($items->count() == 0)
                <div class="flex flex-col items-center justify-center mt-20">
                    <h1 class="text-2xl font-bold mt-5 text-center">Items not found</h1>
                </div>
            @else
                @foreach ($items as $item)
                    <swiper-slide class="card group px-3 md:px-0">
                        <a href="/product/{{ $item->slug }}" class="card inline-block bg-slate-100 rounded-3xl pt-5">
                            <div class="rounded-2xl w-11/12 h-44 overflow-hidden m-auto flex justify-center items-center">
                                @if ($item->image == Storage::exists($item->image))
                                    <img src="{{ asset('/storage/' . $item->image) }}" alt=""
                                        class="object-cover group-hover:scale-125 w-full m-auto thumb bg-white group-hover:shadow-lg  group-hover:shadow-slate-300 transition-all duration-300">
                                @else
                                    <img src="{{ asset('img/hippocampuss.png') }}" alt=""
                                        class="object-cover group-hover:scale-125 w-full m-auto thumb bg-white group-hover:shadow-lg  group-hover:shadow-slate-300 transition-all duration-300">
                                @endif
                            </div>
                            <div class="title w-11/12 mt-3 pb-3 m-auto">
                                <h4
                                    class="tulisan inline-block text-xl font-semibold font-poppins leading-tight tracking-normal duration-500">
                                    <span class="link link-underline link-underline-black">
                                        {{ $item->name }}
                                        {{-- @if ($item->discount > 0)
                                        <span class="ml-3 text-xs font-thin m-auto">Disc.
                                            {{ $item->discount }}%</span>
                                    @endif --}}
                                    </span>
                                </h4>
                                <div class="date font-base text-black">
                                    <p class="category mb-1 font-bold rounded-full text-xl text-slate-900">
                                        IDR {{ number_format($item->after_discount, 0, ',', '.') }}</p>
                                    @if ($item->discount > 0)
                                        <p class="bg-blue-100 rounded-xl text-blue-700 inline p-2 text-xs font-medium">
                                            {{ $item->discount }}%</p>
                                        <p class="inline text-xs line-through">IDR
                                            {{ number_format($item->price, 0, ',', '.') }}
                                        </p>
                                    @endif
                                </div>

                            </div>
                        </a>
                    </swiper-slide>
                @endforeach
            @endif
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
                        slidesPerView: 3,
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

        <script type="text/javascript">
            function zoom(e) {
                var zoomer = e.currentTarget;
                e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
                e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
                x = offsetX / zoomer.offsetWidth * 100
                y = offsetY / zoomer.offsetHeight * 100
                zoomer.style.backgroundPosition = x + '% ' + y + '%';
            }
        </script>
    </body>
@endsection
