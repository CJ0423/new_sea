@extends('front.index')

@section('title')
    A-3
@endsection

@section('css')
    @vite(['resources/css/front/a3.scss'])
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

@php
    $array = ['patter-925X1500', 'patter-925X1000', 'patter-925X480', 'patter-1860X550'];
@endphp

@section('version')
    <div class="container-pc container-pc-a3">
        @foreach ($activities as $index => $item)
            <div data-aos="custom-animation-up" class="a{{ $index + 1 }} {{ $item->img_size_pad }} ">
                <figure class="main-img a1-{{ $index + 1 }}">

                    <div class="{{ $array[$index] }}">
                        <figcaption>
                            <h2>{{ $item->title }}</h2>
                            <h3>{{ $item->subtitle }}</h3>
                            <a href="{{ $item->button_link }}" class="buy-now-button">{{ $item->button_name }}</a>
                        </figcaption>
                    </div>

                </figure>
            </div>
        @endforeach
        <div style="clear: both"></div>

    </div>
@endsection
