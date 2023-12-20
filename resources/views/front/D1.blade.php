@extends('front.index')

@section('title')
    D-1
@endsection

@section('css')
    @vite(['resources/css/front/d1.scss'])
    <style>
        @foreach ($activities as $index => $item)
            .a1-{{ $index + 1 }} {
                background-image: url("{{ asset('storage/' . $item->img_pc_url) }}");
            }

            @media (max-width:767px) {
                .a1-{{ $index + 1 }} {
                    background-image: url("{{ asset('storage/' . $item->img_pad_url) }}");
                }

            }
        @endforeach
    </style>
@endsection

@section('version')
    <div class="container-pc container-pc-d1">
        @foreach ($activities as $index => $item)
            <div data-aos="custom-animation-up" class="d{{ $index + 1 }} {{ $item->img_size_pad }} ">
                <figure class="main-img a1-{{ $index + 1 }}">
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
