<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="./css/swiper.css"> -->
    @vite(['resources/css/front/app.scss'])
    {{-- <link rel="stylesheet" href="{{asset('css/mycss.css')}}"> --}}
    <!-- Demo styles -->
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid">
            <img src="{{ asset('front-img/Logo.png') }}" alt="">

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel" style="width: 300px">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"> <img src="./img/Logo.png" alt="">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body justify-content-end">
                    <ul class="navbar-nav justify-content-end flex-grow pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                限時主打活動1
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">配對找真愛 > 尋找你的命定硬碟</a></li>
                                <li><a class="dropdown-item" href="#">備份知多少 > 快問快答立即測驗</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                限時主打活動2
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">配對找真愛 > 尋找你的命定硬碟</a></li>
                                <li><a class="dropdown-item" href="#">備份知多少 > 快問快答立即測驗</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                限時主打活動3
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">配對找真愛 > 尋找你的命定硬碟</a></li>
                                <li><a class="dropdown-item" href="#">備份知多少 > 快問快答立即測驗</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                限時主打活動4
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">配對找真愛 > 尋找你的命定硬碟</a></li>
                                <li><a class="dropdown-item" href="#">備份知多少 > 快問快答立即測驗</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                限時主打活動5
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">配對找真愛 > 尋找你的命定硬碟</a></li>
                                <li><a class="dropdown-item" href="#">備份知多少 > 快問快答立即測驗</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                限時主打活動6
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">配對找真愛 > 尋找你的命定硬碟</a></li>
                                <li><a class="dropdown-item" href="#">備份知多少 > 快問快答立即測驗</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                限時主打活動7
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">配對找真愛 > 尋找你的命定硬碟</a></li>
                                <li><a class="dropdown-item" href="#">備份知多少 > 快問快答立即測驗</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                限時主打活動8
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">配對找真愛 > 尋找你的命定硬碟</a></li>
                                <li><a class="dropdown-item" href="#">備份知多少 > 快問快答立即測驗</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                                <li><a class="dropdown-item" href="#">希捷愛地球 > 攜手減少電子垃圾</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Swiper -->
    <section class="banner-pc">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <style>
                        .banner-img {
                            width: 100%;
                            height: 100%;
                            background-image: url("{{ asset('storage/img/banner/主視覺.png') }}");
                            background-position: center;
                            background-size: cover;
                            background-repeat: no-repeat;

                            @media (max-width:767px) {
                                background-image: url("{{ asset('storage/img/banner/主視覺手機版.png') }}");
                            }
                        }
                    </style>
                    <figure class="banner-img">
                        {{-- <figcaption>
                            <h2>主標題文字</h2>
                            <h3>副標題文字</h3>
                            <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                        </figcaption> --}}
                    </figure>
                </div>
                <div class="swiper-slide">
                    <style>
                        .banner-img {
                            width: 100%;
                            height: 100%;
                            background-image: url("{{ asset('storage/img/banner/主視覺.png') }}");
                            background-position: center;
                            background-size: cover;
                            background-repeat: no-repeat;

                            @media (max-width:767px) {
                                background-image: url("{{ asset('storage/img/banner/主視覺手機版.png') }}");
                            }
                        }
                    </style>
                    <figure class="banner-img">
                        {{-- <figcaption>
                            <h2>主標題文字</h2>
                            <h3>副標題文字</h3>
                            <a href="link-to-purchase-page" class="buy-now-button">按鍵名稱</a>
                        </figcaption> --}}
                    </figure>
                </div>
            </div>
            <div class="swiper-button-next">
                <img src="{{ asset('front-img/arrow-left.png') }}" alt="">
            </div>
            <div class="swiper-button-prev">
                <img src="{{ asset('front-img/arrow-right.png') }}" alt="">
            </div>

        </div>
    </section>
    <!-- 6icon -->
    <section>
        <div class="icons-control">
            <div class="icons">
                <div class="grop1">
                    <div class="icon">
                        <a href="#">
                            <img style="display: block;" src="{{ asset('front-img/icon/icon.svg') }}" alt="">
                            <div>Game pass</div>
                        </a>
                    </div>
                    <div class="icon">
                        <a href="#">
                            <img src="{{ asset('front-img/icon/icon1.svg') }}" alt="">
                            <div>遊戲</div>
                        </a>
                    </div>
                    <div class="icon">
                        <a href="#">
                            <img src="{{ asset('front-img/icon/icon2.svg') }}" alt="">
                            <div>主機</div>
                        </a>
                    </div>

                </div>

                <div class="grop2">
                    <div class="icon">
                        <a href="#">
                            <img src="{{ asset('front-img/icon/icon3.svg') }}" alt="">
                            <div>配件</div>
                        </a>
                    </div>
                    <div class="icon">
                        <a href="#">
                            <img src="{{ asset('front-img/icon/icon4.svg') }}" alt="">
                            <div>特惠商品</div>
                        </a>
                    </div>
                    <div class="icon">
                        <a href="#">
                            <img src="{{ asset('front-img/icon/icon5.svg') }}" alt="">
                            <div>登入</div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- 品牌圖 -->
    <section>
        @yield('version')
    </section>

    <section>
        <footer>
            <h1 class="title">推薦通路</h1>
            <div class="swiper-control">
                <div class="swiper2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="" class="recommend-logo">
                                <img src="{{ asset('storage/img/recommend/56NTurRi8OQBFClRg3HIVazALEo4741d8a7ojdsm.png') }}" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="" class="recommend-logo">
                                <img src="{{ asset('storage/img/recommend/YJzdUF5UCrQFkvXMSKaRQnE91B7lyMfYyJVtVhdd.png') }}" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="" class="recommend-logo">
                                <img src="{{ asset('storage/img/recommend/qhud1FA0S42lJdd9sYjaHEGGIyVy5Pr0TLyf23Gy.png') }}" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="" class="recommend-logo">
                                <img src="{{ asset('storage/img/recommend/56NTurRi8OQBFClRg3HIVazALEo4741d8a7ojdsm.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-button-next">
                        <img src="{{ asset('front-img/arrow-left2.png') }}" alt="">
                    </div>
                    <div class="swiper-button-prev">
                        <img src="{{ asset('front-img/arrow-right2.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="fallow">
                    <div>追蹤 Seagate 或 造訪部落格</div>
                    <div> 取得最新的資料趨勢資訊</div>
                </div>
                <div class="icons">
                    <div class="icon">
                        <a href=""><img src="{{ asset('img/icon/icon-bottom/Link.png') }}"
                                alt=""></a>
                    </div>
                    <div class="icon">
                        <a href=""><img src="{{ asset('img/icon/icon-bottom/Link (1).png') }}"
                                alt=""></a>
                    </div>
                    <div class="icon">
                        <a href=""><img src="{{ asset('img/icon/icon-bottom/Link (2).png') }}"
                                alt=""></a>
                    </div>
                    <div class="icon">
                        <a href=""><img src="{{ asset('img/icon/icon-bottom/Link (3).png') }}"
                                alt=""></a>
                    </div>

                </div>
                <hr>
            </div>
            <div class="footer-link">
                <a href="">隱私權政策</a>
                <div>|</div>
                <a href="">法律</a>
                <div>|</div>
                <a href="">聯絡我們</a>
            </div>
            <div class="copyright">
                <div> Copyright © 2023 Xander International Corp. </div>
                <div>All Rights Reserved.</div>
            </div>
        </footer>
    </section>


    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            once: true, // AOS 動畫只執行一次
        });
    </script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        var swiper = new Swiper('.swiper2', {
            slidesPerView: getDirection(),
            direction: 'horizontal',
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            init: function() {
                this.update() // 確保在初始化時更新一次
            },
            resize: function() {
                this.params.slidesPerView = getDirection() // 更新參數
                this.update() // 調用update()方法來應用變化
            },
        })

        function getDirection() {
            var windowWidth = window.innerWidth
            let direction = 0

            if (window.innerWidth <= 900) {
                direction = 1
                console.log(1)
            } else if (window.innerWidth <= 1200) {
                direction = 2
                console.log(2)
            } else {
                direction = 3
                console.log(3)
            }
            return direction
        }
        // 呼叫 getDirection 函數並更新 swiper 的 slidesPerView
        // 當視窗載入時
        window.addEventListener('load', function() {
            swiper.params.slidesPerView = getDirection()
            swiper.update()
        })

        // 確保當視窗大小改變時，也會更新 swiper
        window.addEventListener('resize', function() {
            swiper.params.slidesPerView = getDirection()
            swiper.update()
        });
    </script>
    <script src="./js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
