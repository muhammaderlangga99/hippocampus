@extends('main')

@section('content')
    @if ($jumbotron->count() == 1)
        <div class="flex flex-col items-center font-montserrat justify-center mt-20">
            <h1 class="text-2xl font-bold mt-5">Items not found</h1>
        </div>
    @else
        <section class="header">
            @include('product.jumbotron')
        </section>
    @endif
    @if ($items->count() == 0)
        <div class="flex flex-col items-center font-montserrat justify-center mt-20">
            <h1 class="text-2xl font-bold mt-5">Items not found</h1>
        </div>
    @else
        <section class="product">
            @include('product.items')
        </section>
    @endif
    <section class="custom">
        @include('product.custom')
    </section>
    <section class="contact">
        @include('product.allitems')
    </section>
@endsection
