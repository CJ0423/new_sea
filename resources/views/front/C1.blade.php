@extends('front.index')

@section('title')
    C-1
@endsection

@section('css')
@vite(['resources/css/front/c1.scss'])
<style>
    @media (max-width:767px) {
        .a1-1 {
            background-image: url("{{ asset('front-img/mainImg/a1/3-3.png') }}") !important;
        }

        .a1-2{
            background-image: url("{{ asset('front-img/mainImg/a1/4-4.png') }}") !important;
        }
        .a1-3 {
            background-image: url("{{ asset('front-img/mainImg/a1/3-3.png') }}") !important;
        }

        .a1-4 {
            background-image: url("{{ asset('front-img/mainImg/a1/4-4.png') }}") !important;
        }
        .a1-5 {
            background-image: url("{{ asset('front-img/mainImg/a1/4-4.png') }}") !important;
        }
        .a1-6 {
            background-image: url("{{ asset('front-img/mainImg/a1/4-4.png') }}") !important;
        }
    }
</style>
@endsection

@section('version')
    <div class="container-pc container-pc-c1">
        <div data-aos="custom-animation-up" class="c1 row-img">
            <figure class="main-img a1-1" style="background-image: url('{{ asset('front-img/mainImg/a1/3-3.png') }}');">
                <figcaption>
                    <h2>主標題文字1</h2>
                    <h3>副標題文字1</h3>
                    <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                </figcaption>
            </figure>
        </div>
        <div data-aos="custom-animation-up" class="c2 row-img">
            <figure class="main-img a1-2" style="background-image: url('{{ asset('front-img/mainImg/a1/3-3.png') }}');">
                <figcaption>
                    <h2>主標題文字2</h2>
                    <h3>副標題文字2</h3>
                    <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                </figcaption>

            </figure>
        </div>
        <div data-aos="custom-animation-up" class="c3 row-img">
            <figure class="main-img a1-3" style="background-image: url('{{ asset('front-img/mainImg/a1/4-4.png') }}');">
                <figcaption>
                    <h2>主標題文字3</h2>
                    <h3>副標題文字3</h3>
                    <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                </figcaption>
            </figure>
        </div>
        <div data-aos="custom-animation-up" class="c4 row-img">
            <figure class="main-img a1-4" style="background-image: url('{{ asset('front-img/mainImg/a1/2-2.png') }}');">
                <figcaption>
                    <h2>主標題文字4</h2>
                    <h3>副標題文字4</h3>
                    <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                </figcaption>
            </figure>
        </div>
        <div data-aos="custom-animation-up" class="c5 row-img">
            <figure class="main-img a1-5" style="background-image: url('{{ asset('front-img/mainImg/a1/4-4.png') }}');">
                <figcaption>
                    <h2>主標題文字5</h2>
                    <h3>副標題文字5</h3>
                    <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                </figcaption>
            </figure>
        </div>
        <div data-aos="custom-animation-up" class="c6 column-img">
            <figure class="main-img a1-6" style="background-image: url('{{ asset('front-img/mainImg/a1/2-2.png') }}');">
                <figcaption>
                    <h2>主標題文字6</h2>
                    <h3>副標題文字6</h3>
                    <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                </figcaption>
            </figure>
        </div>
        <div style="clear: both"></div>
    </div>
@endsection
