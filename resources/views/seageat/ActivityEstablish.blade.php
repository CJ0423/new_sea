@extends('layouts.seagate-templete')


@section('title')
後端管理-建立活動
@endsection

@section('css')
@vite(['resources/css/activityestablish.scss'])
@endsection



@section('cut')
      <!-- 以下分割 -->
      <div class="size16">活動列表</div>
      <div class="border border-0 card">
        <div class="frame-2">
          <div class="size12">建立活動資訊</div>
        </div>
        <div class="frame-3">
          <div class="frame-4">

            <form action="" method="post">
              <div class="input">
                <div class="base-wrapper">
                  <div class="base">
                    <div class="frame-5">
                      <div class="label">桌機版檔案上傳</div>
                      <div class="frame-6">
                        <div class="text-wrapper-5">必填</div>
                      </div>
                    </div>
                    <div class="input-field">
                        <label for="computer" class="border computer-label">選擇檔案</label>
                        <input type="file" name="computer" id="computer" class="computer-input">
                        <span style="position: absolute;
                        right:30%;

                        "

                        >建議比例：</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="input">
                <div class="base-wrapper">
                  <div class="base">
                    <div class="frame-5">
                      <div class="label">手機版檔案上傳</div>
                      <div class="frame-6">
                        <div class="text-wrapper-5">必填</div>
                      </div>
                    </div>
                    <div class="input-field">
                        <label for="phone" class="border phone-label">選擇檔案</label>
                        <input type="file" name="phone" id="phone" class="phone-input">
                    </div>
                  </div>
                </div>
              </div>
              <div class="input">
                <div class="base-wrapper">
                  <div class="base">
                    <div class="frame-5">
                      <div class="label">主標題</div>
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
                      <div class="label">副標題</div>
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
                      <div class="label">按鍵名稱</div>
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
                      <div class="label">按鍵連結</div>
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
