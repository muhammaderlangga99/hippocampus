@extends('main')

@section('content')
    <section class="categori mt-20 font-montserrat">
        <h2 class="text-5xl font-bold text-slate-900 text-center">In Category {{ $title }}</h2>

        <div class="grid m-auto w-10/12 gap-y-3 grid-cols-2 lg:grid-cols-4 md:grid-cols-3 mt-16">
            @foreach ($items as $item)
                <swiper-slide class="card group px-3 md:px-0">
                    <a href="/product/{{ $item->slug }}" class="card inline-block bg-slate-100 rounded-3xl pt-5">
                        <div class="rounded-2xl w-11/12 h-44 overflow-hidden m-auto flex">
                            <img src="{{ asset('/storage/' . $item->image) }}" alt=""
                                class="object-cover group-hover:scale-125 w-full m-auto thumb bg-white group-hover:shadow-lg  group-hover:shadow-slate-300 transition-all duration-300">
                        </div>
                        <div class="title w-11/12 mt-3 pb-3 m-auto">
                            <h4
                                class="tulisan inline-block text-base md:text-xl font-semibold font-poppins leading-tight tracking-normal duration-500">
                                <span class="link link-underline link-underline-black text-center md:text-left md:mx-2">
                                    {{ $item->name }} @if ($item->discount > 0)
                                        <span class="ml-3 text-xs font-thin m-auto">Disc.
                                            {{ $item->discount }}%</span>
                                    @endif
                                </span>
                            </h4>
                            <div class="date flex w-11/12 font-base text-black">
                                <p class="category text-black font-bold rounded-full text-base md:text-xl md:mx-2">IDR
                                    {{ $item->price }}</p>
                            </div>
                        </div>
                    </a>
                </swiper-slide>
            @endforeach
        </div>
    </section>
@endsection
