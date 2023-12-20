@extends('layouts.seagate-templete')


@section('title')
後端管理-編輯選單
@endsection

@section('css')
@vite(['resources/css/editmenu.scss'])
@endsection

{{-- {{dd($child)}} --}}
{{-- {{dd($menu)}} --}}

@section('cut')
<div class="size16">修改選單</div>
<div class="border border-0 card">
    <div class="frame-2">
        <div class="size12">選單資訊</div>
    </div>
    <div class="frame-3">
        <div class="frame-4">


            <form action={{ route('updateMenu', ['id'=>$menu[0]->id]) }} method="post">
                @csrf
                @method('put')
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
                                <input  name="menu_name" type="text" class="border" value="{{$menu[0]->menu_name}}">
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
                                <input name="menu_link" type="text" class="border" value="{{$menu[0]->menu_link}}">
                            </div>
                        </div>
                    </div>
                </div>
                @for ($i=0;$i<4;$i++)
                <hr>
                <div class="input">
                  <div class="base-wrapper">
                    <div class="base">
                      <div class="frame-5">
                        <div class="label">子選單名稱</div>
                      </div>
                      <div class="input-field">
                        @if ($i<count($child))
                        <input name="child_menu_id{{$i}}" type="hidden" class="border" value="{{$child[$i]->id}}">
                        <input name="child_menu{{$i}}" type="text" class="border" value="{{$child[$i]->menu_name}}">
                        @else
                        <input name="child_menu_id{{$i}}" type="hidden" class="border" value="insert">
                        <input name="child_menu_new{{$i}}" type="text" class="border">
                        @endif

                      </div>
                    </div>
                  </div>
                </div>
                <div class="input">
                  <div class="base-wrapper">
                    <div class="base">
                      <div class="frame-5">
                        <div class="label">子選單連結</div>
                      </div>
                      <div class="input-field">
                        @if ($i<count($child))
                        <input name="menu_link{{$i}}" type="text" class="border"  value="{{$child[$i]->menu_link}}">
                        @else
                        <input name="menu_link_new{{$i}}" type="text" class="border">
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                @endfor

                <div class="frame-7">
                    <button class="border-0 button-2" type="submit">
                        <div class="text-4">儲存</div>
                    </button>
                    <button href="" class="border button-3" type="button" onclick="window.history.back();">
                        <div class="text-5">捨棄</div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
