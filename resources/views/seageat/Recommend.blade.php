@extends('layouts.seagate-templete')


@section('title')
    後端管理-推薦通路管理
@endsection

@section('css')
    @vite(['resources/css/recommend.scss'])
@endsection
@section('cut')
    <!-- 以下分割 -->
    <div class="size16">推薦通路管理</div>
    <div class="border border-0 card">

        <!-- 提示訊息 -->
        <!-- <div class="prompt-box-down">
              <div class="prompt">
                <p class="size14">確定要下架嗎?</p>
                <div>
                  <input class="border confirm" type="button" value="確認">
                  <input class="border cancel" type="button" value="取消">
                </div>
              </div>
            </div> -->

        <div class="frame-2">
            <div class="size12">推薦通路列表</div>
            <div>
                <a href={{ route('RecommendEstablish') }} class="button-establish">


                    <img class="icon-outline-plus" src={{ asset('img/icon-outline-plus-22.svg') }} />
                    <div class="text-2"> 建立通路</div>
                </a>
            </div>
        </div>




        <form id="delete-form" method="post">
            @method('DELETE')
            @csrf
            <div class="frame-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">編號</th>
                            <th scope="col">推薦通路Logo</th>
                            <th scope="col">推薦通路連結</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recommendData as $index => $item)
                            <tr class="border-bottom">
                                <th scope="row">{{ $index + 1 }}</th>
                                <td><img src='{{ asset('storage/' . $item->logo_url) }}'alt=""></td>
                                <td><a href="{{ $item->logo_link }}" target="_blank">{{ substr($item->logo_link, 0, 100) }}{{ (strlen($item->logo_link) > 100) ? "......" : "" }}</a></td>
                                <td>
                                    <div class="operate">
                                        <a href=" {{ route('RecommendRevise', ['id' => $item->id]) }}"
                                            class="border border-0 button-edit">編輯</a>
                                        <input data-key="{{ route('destoryRecommend', ['id' => $item->id]) }}" type="button"
                                            class="border button-delete" value="刪除">


                                        {{-- 現在已經到了 可以更新的地方了 但是還沒有把資料傳過去 --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </form>
        <div class="prompt-box-down">
            <div class="prompt">
                <p class="size14">確定要捨棄嗎?</p>
                <div>
                    <input class="border confirm" type="button" value="確認">
                    <input class="border cancel" type="button" value="取消">
                </div>
            </div>
        </div>
    </div>
    <!-- 以上分割 -->
@endsection

@section('js')
    <script src={{ asset('./thedatepicker-master/dist/the-datepicker.js') }}></script>
    <script src={{ asset('./thedatepicker-master/dist/dataPicker.js') }}></script>
    @vite(['resources/js/recommend.js'])
@endsection
