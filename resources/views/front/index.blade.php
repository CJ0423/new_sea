<!DOCTYPE html>
<html lang="en">
{{-- {{ dd($swiper) }} --}}

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
    <style>
        .close::after {
            content: none;
        }
    </style>
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
                        {{-- {{ dd($menus)}} --}}

                        {{-- {{dd($menus)}} --}}

                        @foreach ($menus as $item)
                            <li class="nav-item dropdown">
                                <a href=" {{ $item->menu_link }}"
                                    role="button"@if ($item->childMenus[0]->menu_name != null) class="nav-link dropdown-toggle fw-bold "data-bs-toggle="dropdown" aria-expanded="false" >{{ $item->menu_name }} @else class="nav-link dropdown-toggle fw-bold close"  > {{ $item->menu_name }} @endif
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @foreach ($item->childMenus as $data)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ $data->menu_link }}">{{ $data->menu_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    {{-- 超連結怪怪的 --}}
    <!-- Swiper -->
    <section class="banner-pc">
        <div class="swiper bannerSwiper">
            <div class="swiper-wrapper">
                @foreach ($swiper as $item)
                    <div class="swiper-slide"  onclick="window.open('{{ $item->button_link }}', '_blank');">
                        <style>
                            .banner-img {
                                width: 100%;
                                height: 100%;
                                background-image: url({{ asset('storage/' . $item->img_pc_url) }});

                                background-position: center;
                                background-size: cover;
                                background-repeat: no-repeat;

                                @media (max-width:767px) {
                                    background-image: url({{ asset('storage/' . $item->img_pad_url) }});
                                }
                            }
                        </style>
                        @if (pathinfo($item->img_pc_url, PATHINFO_EXTENSION) == 'png')
                            <img src="{{ asset('storage/' . $item->img_pc_url) }}" class="banner-img banner-img-pc">
                            <img src="{{ asset('storage/' . $item->img_pad_url) }}" class="banner-img banner-img-pad">
                        @elseif (pathinfo($item->img_pc_url, PATHINFO_EXTENSION) == 'mp4')
                            <video src="{{ asset('storage/' . $item->img_pc_url) }}" type="video/mp4" muted playsinline
                                class="video-slide-pc"></video>
                            <video src="{{ asset('storage/' . $item->img_pad_url) }}" type="video/mp4" muted
                                playsinline class="video-slide-pad"></video>
                        @endif
                    </div>
                @endforeach

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
                @foreach ($icon as $index => $item)
                    @if ($index == 0)
                        <div class="grop1">
                    @endif
                    @if ($index < 3)
                        <div class="icon">
                            <a href="{{ $item->icon_url }}">
                                <img style="display: block; max-width:100%;"
                                    src="{{ asset('storage/' . $item->icon_img) }}" alt="">
                                <div>{{ $item->icon_name }}</div>
                            </a>
                        </div>
                    @endif
                    @if ($index == 2)
            </div>
            <div class="grop2">
                @endif
                @if ($index > 2)
                    <div class="icon">
                        <a href="{{ $item->icon_url }}">
                            <img style="display: block; max-width:100%;"
                                src="{{ asset('storage/' . $item->icon_img) }}" alt="">
                            <div>{{ $item->icon_name }}</div>
                        </a>
                    </div>
                @endif
                @endforeach
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
                        {{-- {{ dd($recommend) }} --}}
                        @foreach ($recommend as $item)
                            <div class="swiper-slide">
                                <a href={{ $item->logo_link }} class="recommend-logo">
                                    <img src="{{ asset('storage/' . $item->logo_url) }}" alt="">
                                </a>
                            </div>
                        @endforeach
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
                        <a href=""><img src="{{ asset('img/icon/icon-bottom/Link.png') }}" alt=""></a>
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
        let second = 3000;
        let version;
        let timerId;
        if (window.innerWidth >= 768) {
            version = "video-slide-pc";
        } else {
            version = "video-slide-pad";
        }
        let firstVideo = document.querySelector(`.${version}`);
        let videoWidth;
        let videoHeight;
        let radio = window.innerWidth;
        if (firstVideo) {

            firstVideo.addEventListener('loadedmetadata', function() {
                videoWidth = firstVideo.videoWidth;
                videoHeight = firstVideo.videoHeight;
                let allSlide = document.querySelectorAll('.swiper-slide');
                allSlide.forEach(item => {
                    for (let i = 0; i < item.children.length; i++) {
                        if (item.children[i].tagName === "IMG") {
                            item.children[i].style.width = `${radio}px`;
                            item.children[i].style.height = `${radio / videoWidth * videoHeight}px`;
                        } else if (item.children[i].tagName === "VIDEO") {
                            if (item.children[i].classList.contains(version)) {
                                item.children[i].setAttribute("width", `${radio}`);
                                item.children[i].setAttribute("height",
                                    `${radio / videoWidth * videoHeight}`);
                            }
                        }
                    }
                    item.style.width = `${radio}px`;
                });
            });

        } else {
            videoWidth = window.innerWidth;
            videoHeight = window.innerWidth * 0.36;
        }
        var bannerSwiper = new Swiper(".bannerSwiper", {
            autoplay: false,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: "auto",
            on: {
                init: function() {
                    let firstSwiperSlide = document.querySelector('.bannerSwiper .swiper-slide');
                    let isVideo = false;
                    for (let i = 0; i < firstSwiperSlide.children.length; i++) {
                        if (firstSwiperSlide.children[i].tagName === "VIDEO") {
                            isVideo = true;
                            break;
                        } else if (firstSwiperSlide.children[i].tagName === "IMG") {
                            timerId = setTimeout(function() {
                                bannerSwiper.slideNext();
                            }, second);
                            break;
                        }
                    }
                    if (isVideo) {
                        for (let i = 0; i < firstSwiperSlide.children.length; i++) {
                            if (firstSwiperSlide.children[i].classList.contains(version)) {
                                firstSwiperSlide.children[i].addEventListener('ended', videoNext);
                                firstSwiperSlide.children[i].play();
                            }
                        }
                    }
                },
                slideChange: function() {
                    let allSwiperSlide = document.querySelectorAll('.bannerSwiper .swiper-slide');
                    allSwiperSlide.forEach(item => {
                        for (let i = 0; i < item.children.length; i++) {
                            if (item.children[i].tagName === "VIDEO") {
                                item.children[i].pause();
                                item.children[i].currentTime = 0;
                                item.children[i].removeEventListener('ended', videoNext);
                            }
                        }
                        clearTimeout(timerId);
                    });
                    let lastOne = false;
                    let nowVideo = null;
                    let item = this.slides[this.activeIndex];
                    let tagType = null;
                    if (this.realIndex === (this.slides.length - 1)) {
                        lastOne = true;
                    }
                    for (let i = 0; i < item.children.length; i++) {
                        tagType = item.children[i].tagName;
                        if (item.children[i].tagName === "VIDEO" && item.children[i].classList.contains(
                                version)) {
                            nowVideo = item.children[i];
                        }
                    }
                    if (!lastOne) {
                        if (tagType === "VIDEO") {
                            if (nowVideo) {
                                nowVideo.play();
                                nowVideo.addEventListener('ended', videoNext);
                            }
                        } else if (tagType === "IMG") {
                            timerId = setTimeout(function() {
                                bannerSwiper.slideNext();
                            }, second);
                        }
                    } else {
                        if (tagType === "VIDEO") {
                            if (nowVideo) {
                                nowVideo.play();
                                nowVideo.addEventListener('ended', videoNext);
                                nowVideo.addEventListener('ended', function() {
                                    bannerSwiper.slideTo(0, 500);
                                });
                            }
                        } else if (tagType === "IMG") {
                            timerId = setTimeout(function() {
                                bannerSwiper.slideTo(0, 500);
                                lastOne = false;
                            }, second);
                        }
                    }
                },
            },
        });

        function videoNext() {
            bannerSwiper.slideNext();
            this.removeEventListener('ended', videoNext);
        }
        resizeImg();

        function resizeImg() {

            if (window.innerWidth >= 768) {
                version = "video-slide-pc";
            } else {
                version = "video-slide-pad";
            }
            firstVideo = document.querySelector(`.${version}`);
            if (firstVideo) {

                videoWidth = firstVideo.videoWidth;
                videoHeight = firstVideo.videoHeight;
                radio = window.innerWidth;
                let allSlide = document.querySelectorAll('.bannerSwiper .swiper-slide');
                allSlide.forEach(item => {
                    for (let i = 0; i < item.children.length; i++) {
                        if (item.children[i].tagName === "IMG") {
                            item.children[i].style.width = `${radio}px`;
                            item.children[i].style.height = `${radio / videoWidth * videoHeight}px`;
                        } else if (item.children[i].tagName === "VIDEO") {
                            if (item.children[i].classList.contains(version)) {
                                item.children[i].setAttribute("width", `${radio}`);
                                item.children[i].setAttribute("height", `${radio / videoWidth * videoHeight}`);
                            }
                        }
                    }
                    item.style.width = `${radio}px`;
                });
            } else {
                let allSlide = document.querySelectorAll('.swiper-slide');
                allSlide.forEach(item => {
                    videoWidth = window.innerWidth;
                    videoHeight = window.innerWidth * 0.36;
                    item.style.width = videoWidth;
                    item.style.height = videoHeight;
                });
            }
        }
        window.addEventListener('resize', resizeImg);
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
                direction = 2
                // console.log(1)
            } else if (window.innerWidth <= 1200) {
                direction = 2
                // console.log(2)
            } else {
                direction = 3
                // console.log(3)
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
