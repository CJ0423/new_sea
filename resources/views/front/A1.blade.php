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
        <div data-aos="custom-animation-up" class="a1 column-img">

            <figure class="main-img a1-1" style="background-image: url('{{ asset('front-img/mainImg/a1/1-1.png') }}')">
                <figcaption >
                    <h2>主標題文字1</h2>
                    <h3>副標題文字1</h3>
                    <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                </figcaption>
            </figure>
        </div>
        <div data-aos="custom-animation-up" class="a2 row-img">
            <figure class="main-img a1-2" style="background-image: url('{{ asset('front-img/mainImg/a1/3-3.png') }}');">
                <figcaption>
                    <h2>主標題文字2</h2>
                    <h3>副標題文字2</h3>
                    <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                </figcaption>

            </figure>
        </div>
        <div data-aos="custom-animation-up" class="a3 row-img">
            <figure class="main-img a1-3" style="background-image: url('{{ asset('front-img/mainImg/a1/4-4.png') }}');">
                <figcaption>
                    <h2>主標題文字3</h2>
                    <h3>副標題文字3</h3>
                    <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                </figcaption>
            </figure>
        </div>
        <div data-aos="custom-animation-up" class="a4 column-img">
            <figure class="main-img a1-4" style="background-image: url('{{ asset('front-img/mainImg/a1/2-2.png') }}');">
                <figcaption>
                    <h2>主標題文字4</h2>
                    <h3>副標題文字4</h3>
                    <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                </figcaption>
            </figure>
        </div>
        <div style="clear: both"></div>
    </div>
@endsection
