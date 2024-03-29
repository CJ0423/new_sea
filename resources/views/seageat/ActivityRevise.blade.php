{{-- {{dd($activity)}} --}}


@extends('layouts.seagate-templete')



@section('title')
建立活動-版型設定-修改
@endsection

@section('css')

@vite(['resources/css/activityrevise.scss'])


{{-- <link rel="stylesheet" href="./css/activitiesAdded.css"> --}}
{{-- 檔案名稱要改 --}}
@endsection

@section('cut')
<!-- 以下分割 -->
<div class="size16">修改活動</div>
<div class="border border-0 card">
  <div class="frame-2">
    <div class="size12">活動資訊</div>
  </div>
  <div class="frame-3">
    <div class="frame-4">


        <form action={{route('ActivityRevise.update',$activity->id)}} method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="_method" value="PUT">
          <div class="input">
            <div class="base-wrapper">
              <div class="base">
                <div class="frame-5">
                  <div class="label">桌機版檔案上傳</div>
                  {{-- <div class="frame-6">
                    <div class="text-wrapper-5">必填</div>
                  </div> --}}
                </div>
                <div class="input-field">
                    <label for="computer" class="border computer-label">更新檔案</label>
                    <input type="file" name="computer" id="computer" class="computer-input" value={{$activity->id}} accept="image/png, image/jpeg, image/gif">
                    <img  src="{{ Storage::url($activity->img_pc_url) }}" alt="Activity Image" style=" position: absolute; right:1px;max-width: 100px; max-height: 100px;" />
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
                        <option value="925:480" {{ $activity->img_size_pc == '925:480' ? 'selected' : '' }}>寬:925 高:480</option>
                        <option value="925:550" {{ $activity->img_size_pc == '925:550' ? 'selected' : '' }}>寬:925 高:550</option>
                        <option value="925:850" {{ $activity->img_size_pc == '925:850' ? 'selected' : '' }}>寬:925 高:850</option>
                        <option value="925:1000" {{ $activity->img_size_pc == '925:1000' ? 'selected' : '' }}>寬:925 高:1000</option>
                        <option value="925:1130" {{ $activity->img_size_pc == '925:1130' ? 'selected' : '' }}>寬:925 高:1130</option>
                        <option value="925:1500" {{ $activity->img_size_pc == '925:1500' ? 'selected' : '' }}>寬:925 高:1500</option>
                        <option value="1860:550" {{ $activity->img_size_pc == '1860:550' ? 'selected' : '' }}>寬:1860 高:550</option>
                    </select>
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
                  {{-- <div class="frame-6">
                    <div class="text-wrapper-5">必填</div>
                  </div> --}}
                </div>
                <div class="input-field">
                    <label for="phone" class="border phone-label">更新檔案</label>
                    <input  type="file" name="phone" id="phone" class="phone-input" accept="image/png, image/jpeg, image/gif">
                    <img  src="{{ Storage::url($activity->img_pad_url) }}" alt="Activity Image" style=" position: absolute; right:1px;max-width: 100px; max-height: 100px;" />
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
                  <option value="column-img" {{ $activity->img_size_pad == 'column-img' ? 'selected' : '' }}>方型</option>
                  <option value="row-img" {{ $activity->img_size_pc == 'row-img' ? 'selected' : '' }}>長型</option>
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
                  <input required type="text" class="border" name="title" value={{ $activity->title}}>
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
                  <input type="text" class="border" name="subtitle" value={{ $activity->subtitle}}>
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
                  <input type="text" class="border" name="button_name"
                  value={{ $activity->button_name}}>
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
                  <input type="text" class="border" name="button_link" value={{$activity->button_link}}>
                </div>
              </div>
            </div>
          </div>

          <div class="frame-7">
              <button class="border button-3"><div class="text-5">捨棄修改</div></button>

            <button type="submit" class="border-0 button-2"><div class="text-4">儲存</div></button>
          </div>
        </form>

    </div>
  </div>
</div>
<!-- 以上分割 -->
@endsection

@section('js')
<script src={{asset("./thedatepicker-master/dist/the-datepicker.js")}}></script>
<script src={{asset("./thedatepicker-master/dist/dataPicker.js")}}></script>

@endsection
