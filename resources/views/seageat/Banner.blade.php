@extends('layouts.seagate-templete')


@section('title')
    後端管理-Banner管理
@endsection

@section('css')
    @vite(['resources/css/banner.scss'])
@endsection
@section('cut')
    <!-- 以下分割 -->
    <div class="size16">Banner列表</div>
    <div class="border border-0 card">
        <!-- 提示訊息 -->
        {{-- <div class="prompt-box-down">
          <div class="prompt">
            <p class="size14">確定要下架嗎?</p>
            <div>
              <input class="border confirm" type="button" value="確認">
              <input class="border cancel" type="button" value="取消">
            </div>
          </div>
        </div> --}}

        <div class="border-bottom frame-2">
            <div class="size12"><input type="button" class="border border-0 border-bottom border-success-subtle input-all"
                    value="全部"><input type="button" class="border border-0 border-bottom border-success-subtle input-down"
                    value="已下架"></div>
            <a href={{ route('BannerEstabilsh') }} class="button-establish">
                <img class="icon-outline-plus" src={{ asset('img/icon-outline-plus-22.svg') }}>
                <div class="text-2">建立選單</div>
            </a>
        </div>
        <form action="" method="post">
            <div class="frame-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Banner縮圖</th>
                            <th scope="col">主標題</th>
                            <th scope="col">顯示順序</th>
                            <th scope="col">上架/下架時間</th>
                            <th scope="col">狀態</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $index => $item)
                            <tr class="border-bottom banner-superior">
                                <th scope="row">{{ $index }}</th>
                                <td><img src='{{ asset("storage/$item->img_pc_url") }}' alt=""></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $index }}</td>
                                <td>{{ $item->start_time }}<br>{{ $item->end_time }}</td>
                                <td>
                                    @php
                                        $nowTime = \Carbon\Carbon::now();
                                        // 假设 $items 包含 start_time 和 end_time
                                        $start_time = \Carbon\Carbon::parse($item->start_time);
                                        $end_time = \Carbon\Carbon::parse($item->end_time);

                                        $isOnSale = $start_time->lte($nowTime) && $end_time->gt($nowTime);
                                        $isOffSale = $end_time->lte($nowTime);
                                        $isScheduledToSale = $start_time->gt($nowTime);
                                    @endphp
                                    @if ($isOnSale)
                                        <p>已上架</p>
                                    @elseif ($isScheduledToSale)
                                        <p>排程上架</p>
                                    @else
                                        <p>已下架</p>
                                    @endif

                                </td>
                                <td>
                                    <div class="operate">
                                        {{-- <input type="button" class="border border-0 button-edit" value="編輯"> --}}
                                        <a href={{ route('BannerRevise', [$item->id]) }}
                                            class="border border-0 button-edit">編輯</a>

                                        {{-- 這個a標籤要先取消預設功能 接著在進行判斷 --}}
                                        <button class="border button-down" type="button">下架</button>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{-- <tr class="border-bottom banner-down">
                            <th scope="row">2</th>
                            <td><img src={{ asset('./img/banner01.png') }} alt=""></td>
                            <td>一指輕鬆備份 專為品味而生</td>
                            <td>1</td>
                            <td>2023/11/08 17:00/<br>2023/11/22 00:00</td>
                            <td>已下架</td>
                            <td>
                                <div class="operate">
                                    <input type="button" class="border border-0 button-edit" value="編輯">
                                    <a href={{ route('BannerRevise') }} class="border border-0 button-edit">編輯</a>

                                    這個a標籤要先取消預設功能 接著在進行判斷
                                    <button href="" class="border button-delete" type="button">刪除</button>

                                </div>
                            </td>
                        </tr>
                        <tr class="border-bottom banner-prepare">
                            <th scope="row">3</th>
                            <td><img src={{ asset('./img/banner01.png') }} alt=""></td>
                            <td>一指輕鬆備份 專為品味而生</td>
                            <td>1</td>
                            <td>2023/11/08 17:00/<br>2023/11/22 00:00</td>
                            <td>未上架</td>
                            <td>
                                <div class="operate">
                                    <input type="button" class="border border-0 button-edit" value="編輯">
                                    <a href={{ route('BannerRevise') }} class="border border-0 button-edit">編輯</a>

                                    這個a標籤要先取消預設功能 接著在進行判斷
                                    <button href="" class="border button-delete" type="button">刪除</button>

                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </form>

        <div class="prompt-box-down">
            <div class="prompt">
                <p class="size14">確定要下架嗎?</p>
                <div>
                    <input class="border confirm confirm-down" type="button" value="確認">
                    <input class="border cancel cancel-down" type="button" value="取消">
                </div>
            </div>
        </div>
        <div class="prompt-box-delete">
            <div class="prompt">
                <p class="size14">確定要刪除嗎?</p>
                <div>
                    <input class="border confirm confirm-delete" type="button" value="確認">
                    <input class="border cancel cancel-delete" type="button" value="取消">
                </div>
            </div>
        </div>
    </div>
    <!-- 以上分割 -->
@endsection

@section('js')
    @vite(['resources/js/banner.js'])
@endsection
