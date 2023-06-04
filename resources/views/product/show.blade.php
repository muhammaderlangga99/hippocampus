@extends('main')

@section('content')
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
    <section class="categori mt-20 font-montserrat">
        <h2 class="text-3xl md:text-5xl font-bold text-slate-900 text-center">In Category {{ $title }}</h2>

        <div class="grid m-auto max-w-7xl gap-y-3 grid-cols-2 lg:grid-cols-4 md:grid-cols-3 mt-16">
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
                                class="tulisan inline-block text-base md:text-xl font-semibold font-poppins leading-tight tracking-normal duration-500">
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
        </div>
        <div class="my-10 max-w-7xl px-3 m-auto">
            {{ $items->links() }}
        </div>
    </section>
@endsection
