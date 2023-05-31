@extends('main')

@section('content')
    <section class="header">
        @include('product.jumbotron')
    </section>
    <section class="product">
        @include('product.items')
    </section>
    <section class="custom">
        @include('product.custom')
    </section>
@endsection
