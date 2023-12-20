@extends('front.index')

@section('title')
    A-1
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="{{asset('css/a1.css')}}"> --}}
    @vite(['resources/css/front/a1.scss'])
    <style>
        @media (max-width:767px) {
            .a1-1 {
                background-image: url("{{ asset('front-img/mainImg/a1/1-1.png') }}");
            }

            .a1-2 {
                background-image: url("{{ asset('front-img/mainImg/a1/2-2.png') }}");
            }

            .a1-3 {
                background-image: url("{{ asset('front-img/mainImg/a1/3-3.png') }}") !important;
            }

            .a1-4 {
                background-image: url("{{ asset('front-img/mainImg/a1/4-4.png') }}") !important;
            }
        }
    </style>
@endsection

@section('version')
    <div class="container-pc">
        @foreach ($activities as $index => $item)
            <div data-aos="custom-animation-up" class="a{{ $index + 1 }}{{ $item->img_size_pad }} ">
                <figure class="main-img a1-{{ $index }}">
                    <figcaption>
                        <h2>{{ $item->title }}</h2>
                        <h3>{{ $item->subtitle }}</h3>
                        <a href="{{ $item->button_link }}" class="buy-now-button">{{ $item->button_name }}</a>
                    </figcaption>
                </figure>
            </div>
        @endforeach
        <div style="clear: both"></div>
    </div>
@endsection
