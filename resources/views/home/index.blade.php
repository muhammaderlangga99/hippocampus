@extends('main')

@section('content')
    <div class="overflow-x-hidden">
        <div class="row">
            <div class="col-12">
                @include('home.header')
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @include('home.desc')
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @include('home.comunity')
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @include('home.product')
            </div>
        </div>
    @endsection
