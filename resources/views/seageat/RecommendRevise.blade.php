@extends('layouts.seagate-templete')


@section('title')
後端管理-修改通路
@endsection

@section('css')
@vite(['resources/css/recommendrevise.scss'])
@endsection



@section('cut')
      <!-- 以下分割 -->
      <div class="size16">修改通路</div>
      <div class="border border-0 card">
        <div class="frame-2">
          <div class="size12">推薦通路資訊</div>
        </div>
        <div class="frame-3">
          <div class="frame-4">

            <form action="" method="post">
              <div class="input">
                <div class="base-wrapper">
                  <div class="base">
                    {{-- 這是額外捕的 --}}
                    <img style="max-height: 100px;
                    position:absolute;
                    right:10px;" src={{asset("./img/banner01.png")}} alt="">
                    <div class="frame-5">
                      <div class="label">Logo上傳</div>

                      <div class="frame-6">
                        <div class="text-wrapper-5">必填</div>
                      </div>
                    </div>
                    <div class="input-field">
                        <label for="logo" class="border logo-label">選擇檔案</label>
                        <input type="file" name="logo" id="logo" class="logo-input">
                    </div>
                  </div>
                </div>
              </div>
              <div class="input">
                <div class="base-wrapper">
                  <div class="base">
                    <div class="frame-5">
                      <div class="label">推薦通路名稱</div>
                      <div class="frame-6">
                        <div class="text-wrapper-5">必填</div>
                      </div>
                    </div>
                    <div class="input-field">
                      <input type="text" class="border">
                    </div>
                  </div>
                </div>
              </div>
              <div class="input">
                <div class="base-wrapper">
                  <div class="base">
                    <div class="frame-5">
                      <div class="label">推薦通路連結</div>
                      <div class="frame-6">
                        <div class="text-wrapper-5">必填</div>
                      </div>
                    </div>
                    <div class="input-field">
                      <input type="text" class="border">
                    </div>
                  </div>
                </div>
              </div>

              <div class="frame-7">
                  <button class="border button-3"><div class="text-5">捨棄修改</div></button>
                <button class="border-0 button-2"><div class="text-4">儲存</div></button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- 以上分割 -->
@endsection
