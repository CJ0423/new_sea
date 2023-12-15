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
              <button class="button-establish">
                <img class="icon-outline-plus" src={{asset("img/icon-outline-plus-22.svg")}} />
                <div class="text-2">建立通路</div>
              </button>
          </div>
        </div>
        <form action="" method="post">
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
                <tr class="border-bottom">
                  <th scope="row">1</th>
                  <td><img src={{asset("./img/recommend01.png")}} alt=""></td>
                  <td>https://www.pchomeec.tw/sites/seagate?utm_source=google&utm_medium=cpc&utm_campaign=fq2_cacafly_sem</td>
                  <td>
                    <div class="operate">
                        <input type="button" class="border border-0 button-edit" value="編輯">
                        <input type="button" class="border button-delete" value="刪除">
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
