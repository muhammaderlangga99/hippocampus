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
    </style>

    <body class="px-3">
        <section class="detail m-auto max-w-7xl mt-8 bg-slate-50 border border-slate-200 rounded-2xl font-montserrat">
            <div class="grid pt-6 px-6 md:grid-cols-5 space-x-10">
                <div class="col-span-2">
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
                                <span class=" md:inline">buy on tokopedia</span>
                            </a>
                        </div>
                    </div>
                    <p class="preorder p-3 bg-blue-700 mt-4 text-white font-medium text-center rounded-b-2xl">Pre Order
                    </p>
                </div>

                <div class="md:col-span-3">
                    <div class="detail w-full">
                        <h1 class="text-3xl font-bold text-slate-900">{{ $item->name }}</h1>
                        <p class="text-sm text-slate-500 mt-2">Category: <a href="{{ $item->categori->slug }}"
                                class="text-blue-700 font-medium">{{ $item->categori->name }}</a></p>
                        <p class="text-sm text-slate-500 mt-2">Brand: Hippocampus Indonesia</p>
                        <p class="text-sm text-slate-500 mt-2">Condition: New</p>
                        <p class="text-sm text-slate-500 mt-2">Stock: Full</p>
                        <p class="text-sm text-slate-500 mt-2">Price: Rp. {{ number_format($item->price, 0, ',', '.') }}
                        </p>
                        <div class="toko flex gap-4 my-7">
                            <div class="whatsapp">
                                <a href="https://api.whatsapp.com/send?phone=628111776569&text=Haii%20saya%20tertarik%20untuk%20order%20{{ $item->name }}"
                                    target="_blank"
                                    class="bg-green-50 text-green-800 font-medium hover:bg-green-100 text-lg rounded-full px-4 py-2 inline-block mt-3"><i
                                        class="bi bi-whatsapp mr-1"></i>
                                    Whatsapp</a>
                            </div>
                            <div class="whatsapp">
                                <a href="{{ $item->link }}" target="_blank"
                                    class="bg-green-50 border text-lg border-green-500 text-green-800 font-medium hover:bg-green-100 rounded-full px-4 py-2 inline-block mt-3">
                                    <img src="{{ asset('img/tokopedia.png') }}" class="w-6 inline-block mr-1"
                                        alt="">
                                    Tokopedia</a>
                            </div>
                        </div>
                        <div
                            class="text-sm mt-3 text-slate-500 bg-slate-200 p-2 border border-slate-300 rounded-2xl font-medium">
                            Description:
                            <p>{!! $item->description !!}</p>
                        </div>
                        <p class="text-xs font-medium text-slate-500 mt-5"><i class="bi bi-geo-alt-fill"></i> Ships from:
                            Kota Depok</p>
                    </div>
                </div>

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
        </section>
    </body>
@endsection
