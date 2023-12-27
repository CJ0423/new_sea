@extends('layouts.seagate-templete')


@section('title')
後端管理-建立選單
@endsection

@section('css')
@vite(['resources/css/createmenu.scss'])
@endsection



@section('cut')
  <!-- 以下分割 -->
  <div class="size16">建立選單</div>
  <div class="border border-0 card">
    <div class="frame-2">
      <div class="size12">選單資訊</div>
    </div>
    <div class="frame-3">
      <div class="frame-4">

        <form action={{route(("Storemenu"))}} method="post">
            @csrf
          <div class="input">
            <div class="base-wrapper">
              <div class="base">
                <div class="frame-5">
                  <div class="label">主選單名稱</div>
                  <div class="frame-6">
                    <div class="text-wrapper-5">必填</div>
                  </div>
                </div>
                <div class="input-field">
                  <input name="menu_name" type="text" class="border" required>
                </div>
              </div>
            </div>
          </div>
          <div class="input">
            <div class="base-wrapper">
              <div class="base">
                <div class="frame-5">
                  <div class="label">主選單連結</div>
                  <div class="frame-6">
                    <div class="text-wrapper-5">必填</div>
                  </div>
                </div>
                <div class="input-field">
                  <input name="menu_link" type="text" class="border" required>
                </div>
              </div>
            </div>
          </div>
          @for ($i=0;$i<10;$i++)
          <hr>
          <div class="input">
            <div class="base-wrapper">
              <div class="base">
                <div class="frame-5">
                  <div style="width:auto" class="label">{{$i+1}}:子選單名稱</div>
                </div>
                <div class="input-field">
                  <input name="child_menu{{$i}}" type="text" class="border">
                </div>
              </div>
            </div>
          </div>
          <div class="input">
            <div class="base-wrapper">
              <div class="base">
                <div class="frame-5">
                  <div style="width:auto" class="label">{{$i+1}}:子選單連結</div>
                </div>
                <div class="input-field">
                  <input name="menu_link{{$i}}" type="text" class="border">
                </div>
              </div>
            </div>
          </div>
          @endfor
          <div class="frame-7">
              <button class="border-0 button-2"><div class="text-4">儲存</div></button>
              {{-- <button class="border button-3"><div class="text-5">捨棄</div></button> --}}
              <button type="button" onclick="window.history.back();" class="border button-3"><div class="text-5">捨棄</div></button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- 以上分割 -->
@endsection
