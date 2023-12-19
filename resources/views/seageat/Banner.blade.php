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
        <div class="prompt-box-down">
          <div class="prompt">
            <p class="size14">確定要下架嗎?</p>
            <div>
              <input class="border confirm" type="button" value="確認">
              <input class="border cancel" type="button" value="取消">
            </div>
          </div>
        </div>

        <div class="border-bottom frame-2">
          <div class="size12"><input type="button" class="border border-0 border-bottom border-success-subtle input-all"
              value="全部"><input type="button" class="border border-0 border-bottom border-success-subtle input-down"
              value="已下架"></div>
          <a href={{route('BannerEstabilsh')}} class="button-establish">
            <img class="icon-outline-plus" src={{asset("img/icon-outline-plus-22.svg")}} >
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
                <tr class="border-bottom">
                  <th scope="row">1</th>
                  <td><img src={{asset("./img/banner01.png")}} alt=""></td>
                  <td>一指輕鬆備份 專為品味而生</td>
                  <td>1</td>
                  <td>2023/11/08 17:00/<br>2023/11/22 00:00</td>
                  <td>已上架</td>
                  <td>
                    <div class="operate">
                        {{-- <input type="button" class="border border-0 button-edit" value="編輯"> --}}
                        <a href={{route('BannerRevise')}} class="border border-0 button-edit">編輯</a>

                            {{--這個a標籤要先取消預設功能 接著在進行判斷 --}}
                        <a href="" class="border button-down">下架</a>

                    </div>
                </td>
                </tr>
              </tbody>
            </table>
          </div>


        </form>
      </div>
      <!-- 以上分割 -->
@endsection
