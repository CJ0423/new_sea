<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

{{-- 這是vite呼喚 --}}
    @vite([ 'resources/css/styleguide.css'])
    @vite(['resources/css/globals.css'])
    @vite([ 'resources/css/style.scss',])
    <!-- 這個是特別的 -->
    @yield('css')

</head>

<body>
    <div class="screen">

        <div class="menu">
            <div class="div">
                <ul class="ul-navigation">
                    <a href={{route('Front_page')}} class="text-wrapper">
                        <li class="view viewhover item1">首頁管理</li>
                    </a>

                    <li class="view viewhover item2">
                        <a class="btn btn-primary border border-0 bg-transparent drop-down" data-bs-toggle="collapse"
                            href="#banner" role="button" aria-expanded="false" aria-controls="banner"
                            style="width: 100%;">
                            <div class="text-wrapper" style="position: relative; left: -10px;">Banner管理 <img
                                    class="iconamoon-arrow-down-1" src={{ asset('img/iconamoon-arrow-down-2-thin.svg') }} /></div>

                            <i class="fa-solid fa-chevron-down"></i>
                        </a>
                    </li>
                    <div class="collapse" id="banner">
                        <a href={{route('Banner')}} class="link-light">
                            <div class="div-wrapper viewhover  item3">
                                <div class="text-wrapper">Banner列表</div>
                            </div>
                        </a>
                        <a href={{route('BannerEstabilsh')}} class="link-light">
                            <div class="div-wrapper viewhover  item4">
                                <div class="text-wrapper">建立Banner</div>
                            </div>
                        </a>
                    </div>

                    <li class="view viewhover item5">
                        <a class="btn btn-primary border border-0 bg-transparent drop-down" data-bs-toggle="collapse"
                            href="#activity" role="button" aria-expanded="false" aria-controls="activity"
                            style="width: 100%;">
                            <div class="text-wrapper" style="position: relative; left: -10px;">活動管理 <img
                                    class="iconamoon-arrow-down-2" src={{asset("img/iconamoon-arrow-down-2-thin.svg")}} /></div>
                            <i class="fa-solid fa-chevron-down"></i>
                        </a>
                    </li>
                    <div class="collapse" id="activity">
                        <a href={{ route('activity') }} class="link-light">
                            <div class="div-wrapper viewhover item6">
                                <div class="text-wrapper">活動列表</div>
                            </div>
                        </a>
                        <a href={{route('ActivityEstablish')}} class="link-light">
                            <div class="div-wrapper viewhover item7">
                                <div class="text-wrapper">建立活動</div>
                            </div>
                        </a>
                    </div>

                    <a href={{route('Recommend')}} class="text-wrapper">
                        <li class="view viewhover  item8">推薦通路管理</li>
                    </a>
                </ul>
            </div>
            <div class="logo">
                <img class="img" src={{asset("img/logo.png")}} />
                <div class="text-wrapper-2">後台管理</div>
            </div>
        </div>

        <header class="header">
            <button class="border border-0 bread-sticks">
                <img class="menu-2" src={{asset("img/menu.svg")}} />
            </button>
            <button class="button sign-out">
                <div>
                    <a  class="text" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a>

                    {{-- <a href="{{route('logout')}}" class="text">登出</a> --}}
                </div>
            </button>
            {{-- 隱藏表單協助登出系統 --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </header>
        <div class="frame @yield('special')">
            @yield('cut')
        </div>
    </div>

    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    <script>
        var sticks = document.querySelector('.bread-sticks')
        var menu = document.querySelector('.menu')
        var header = document.querySelector('.header')
        var frame = document.querySelector('.frame')
        var a = 0

        sticks.onclick = function () {
            if (a == 0) {
                menu.style.display = "none"
                header.style.width = "100%"
                header.style.left = "0px"
                frame.style.width = "calc(100% - 48px)"
                frame.style.left = "24px"
                a = 1
            } else if (a == 1) {
                menu.style.display = "flex"
                header.style.width = "calc(100% - 240px)"
                header.style.left = "240px"
                frame.style.width = "calc(100% - 288px)"
                frame.style.left = "264px"
                a = 0
            }
        }
    </script>

    {{-- 來自下架的js --}}
    <script>
        var edit = document.querySelector('.button-edit'); //編輯
        var down = document.querySelector('.button-down'); //下架
        var box_down = document.querySelector('.prompt-box-down'); //下架提示
        var confirm = document.querySelector('.confirm'); //確認
        var cancel = document.querySelector('.cancel'); //取消

        down.onclick = function () {
          box_down.style.display = "flex";
        }
        confirm.onclick = function () {
          box_down.style.display = "none";
        }
        cancel.onclick = function () {
          box_down.style.display = "none";
        }

      </script>
</body>

</html>
