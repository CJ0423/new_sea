{{-- 檔案已經能夠成功建立 --}}
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

            <form action="Create_Activity" method="post" enctype="multipart/form-data">
                @csrf
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
                        <input required required type="file" name="computer" id="computer" class="computer-input" accept="image/png, image/jpeg, image/gif">
                    </div>
                  </div>
                </div>
              </div>
              <div class="input">
                <div class="base-wrapper">
                  <div class="base">
                    <div class="frame-5">
                      <div class="label">桌機圖片類型</div>
                      <div class="frame-6">
                        <div class="text-wrapper-5">必填</div>
                      </div>
                    </div>
                    <div class="input-field">
                    <select required name="img_size_pc" id="">
                        <option value="37:34">37:34</option>
                        <option value="37:40">37:40</option>
                        <option value="37:60">37:60</option>
                        <option value="185:96">185:96</option>
                        <option value="185:112">185:112</option>
                        <option value="185:226">185:226</option>
                        <option value="186:55">186:55</option>
                    </select>
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
                        <input required type="file" name="phone" id="phone" class="phone-input" accept="image/png, image/jpeg, image/gif">>
                    </div>
                  </div>
                </div>
              </div>
              <div class="input">
                <div class="base-wrapper">
                  <div class="base">
                    <div class="frame-5">
                      <div class="label">手機圖片類型</div>
                      <div class="frame-6">
                        <div class="text-wrapper-5">必填</div>
                      </div>
                    </div>
                    <div class="input-field">
                    <select required name="img_size_pad" id="">
                      <option value="column-img">直向 173:196</option>
                      <option value="row-img">橫向 692:369</option>
                    </select>
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
                      <input required type="text" class="border" name="title">
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
                      <input type="text" class="border" name="subtitle">
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
                      <input type="text" class="border" name="button_name">
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
                      <input type="text" class="border" name="button_link">
                    </div>
                  </div>
                </div>
              </div>

              <div class="frame-7">
                  <a href={{route('activity')}}  class="border button-3"><div class="text-5">捨棄修改</div></a>
                <button type="submit" class="border-0 button-2"><div class="text-4">儲存</div></button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- 以上分割 -->
@endsection
