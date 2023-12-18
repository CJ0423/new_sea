{{-- {{建立最新的版型}} --}}
@extends('layouts.seagate-templete')
@section('title')
建立活動-版型設定
{{-- {{$pattern_table}} --}}
{{-- {{dd($chose_pattern[0]->start_time)}} --}}
@endsection

@section('css')

@vite(['resources/css/activityChooseFixPattern.scss'])

<link rel="stylesheet" href={{asset("./thedatepicker-master/dist/the-datepicker.css")}}>

{{-- <link rel="stylesheet" href="./css/activitiesAdded.css"> --}}
{{-- 檔案名稱要改 --}}
@endsection
{{-- {{dd($allActivity)}} --}}

{{-- {{dd(count($textData))}} --}}
{{-- {{dd($textData)}} --}}
{{-- {{dd( $allActivity)}} --}}
@section('special')
{{$selectedPattern}}
{{-- 這邊才是要改的內容 --}}
@endsection
@section('cut')
<!-- 以下分割 -->
<div class="text-wrapper-3">版型設定</div>
<form id="send" action="{{ route('store_patternUpdate', ['id' => $chose_pattern[0]->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    {{-- action={{route('ActivityPatternCreate')}} --}}
    <input type="hidden" name="whitch_pattern" value={{$selectedPattern}}>
    <div class="pattern">
        <h4>請依據編號選取設定</h4>
        <div class="pattern-container">
            <div class="pattern-show">
                <div class="pattern-main">
                    @foreach ($textData as $index=>$item )

                    @endforeach
                    @for ($i=1;$i<=7;$i++)
                    @if(count($textData)>=$i)
                    <div style='background-image:url("{{ asset('storage/' . $textData[$i-1]->img_pc_url) }}")' class="item item{{$i}}"></div>

                    @else
                    <div class="item item{{$i}}"></div>
                    @endif
                    @endfor
                    {{-- <div class="item item2"></div>
                    <div class="item item3"></div>
                    <div class="item item4"></div>
                    <div class="item item5"></div>
                    <div class="item item6"></div>
                    <div class="item item7"></div> --}}
                </div>
                <a style="position: relative;
                top: 40px;" href="./createActivities.html">
                    捨棄修改</a>
            </div>
            <div class="setting-container">
                <h3>版型編號：<span></span></h3>
                @for ($i=1;$i<8;$i++) <div class="area area{{$i}}">
                    <label for="no{{$i}}">編號{{$i}}</label>
                    <div class="select-area">
                        <span>必填</span>

                        <select required name="no{{$i}}" id="no{{$i}}">


                            @foreach ($allActivity as $item )

                            @if(count($textData)>$i)
                                 @if(($textData[$i-1]->activity_id) ==$item->id)
                                     <option selected value={{$item->id}}>{{$item->title}} 比例:{{$item->img_size_pc}}特別的
                                    </option>
                                 @else
                                     <option value={{$item->id}}>{{$item->title}} 比例:{{$item->img_size_pc}}
                                    </option>
                                 @endif
                            @else
                            <option value={{$item->id}}>{{$item->title}} 比例:{{$item->img_size_pc}}
                                {{count($textData)}}
                                {{$i}}
                            </option>
                            @endif

                            @endforeach

                        </select>
                    </div>
            </div>
            @endfor
            {{-- <div class="area area1">
              <label for="no1">編號1</label>
              <div class="select-area">
                <span>必填</span>
                <select name="no1" id="no1">
                  <option value="1">1</option>
                </select>
              </div>
            </div>
            <div class="area area2">
              <label for="no2">編號2</label>
              <div class="select-area">
                <span>必填</span>
                <select name="no2" id="no2">
                  <option value="1">1</option>
                </select>
              </div>
            </div>
            <div class="area area3">
              <label for="no3">編號3</label>
              <div class="select-area">
                <span>必填</span>
                <select name="no3" id="no3">
                  <option value="1">1</option>
                </select>
              </div>
            </div>
            <div class="area area4">
              <label for="no4">編號4</label>
              <div class="select-area">
                <span>必填</span>
                <select name="no4" id="no4">
                  <option value="1">1</option>
                </select>
              </div>
            </div>
            <div class="area area5">
              <label for="no5">編號5</label>
              <div class="select-area">
                <span>必填</span>
                <select name="no5" id="no5">
                  <option value="1">1</option>
                </select>
              </div>
            </div>
            <div class="area area6">
              <label for="no6">編號6</label>
              <div class="select-area">
                <span>必填</span>
                <select name="no6" id="no6">
                  <option value="1">1</option>
                </select>
              </div>
            </div>
            <div class="area area7">
              <label for="no7">編號7</label>
              <div class="select-area">
                <span>必填</span>
                <select name="no7" id="no7">
                  <option value="1">1</option>
                </select>
              </div>
            </div> --}}
            <div class="area">
                <label for="no4">上架時間</label>
                <div class="select-area">
                    <span>必填</span>
                    <div class="input-area">
                        <input required value='{{$chose_pattern[0]->start_time}}'  type="text" class="input-box up-time" name="start-time-input" id="start-time-input" autocomplete="off">
                        <div class="input-img"></div>
                        <div class="date-container">
                            <div id="datePickerStart" class="date-picker datePicker"></div>
                            <div class="picker-control">
                                <button type="button" class="date-clear-button">清除</button>
                                <button type="button" class="date-check-button">確認</button>
                            </div>
                        </div>
                        <ul class="time-list">
                            <li>00:00</li>
                            <li>00:30</li>
                            <li>01:00</li>
                            <li>01:30</li>
                            <li>02:00</li>
                            <li>02:30</li>
                            <li>03:00</li>
                            <li>03:30</li>
                            <li>04:00</li>
                            <li>04:30</li>
                            <li>05:00</li>
                            <li>05:30</li>
                            <li>06:00</li>
                            <li>06:30</li>
                            <li>07:00</li>
                            <li>07:30</li>
                            <li>08:00</li>
                            <li>08:30</li>
                            <li>09:00</li>
                            <li>09:30</li>
                            <li>10:00</li>
                            <li>10:30</li>
                            <li>11:00</li>
                            <li>11:30</li>
                            <li>12:00</li>
                            <li>12:30</li>
                            <li>13:00</li>
                            <li>13:30</li>
                            <li>14:00</li>
                            <li>14:30</li>
                            <li>15:00</li>
                            <li>15:30</li>
                            <li>16:00</li>
                            <li>16:30</li>
                            <li>17:00</li>
                            <li>17:30</li>
                            <li>18:00</li>
                            <li>18:30</li>
                            <li>19:00</li>
                            <li>19:30</li>
                            <li>20:00</li>
                            <li>20:30</li>
                            <li>21:00</li>
                            <li>21:30</li>
                            <li>22:00</li>
                            <li>22:30</li>
                            <li>23:00</li>
                            <li>23:30</li>
                        </ul>
                    </div>
                    <button type="button" class="now-button">現在</button>
                </div>
            </div>
            <div class="area">
                <label for="no5">下架時間</label>
                <div class="select-area">
                    <span class="hidden-span">　　</span>
                    <div class="input-area">
                        <input value='{{$chose_pattern[0]->end_time}}' type="text" class="input-box up-time" name="end-time-input" id="end-time-input" autocomplete="off">
                        <div class="input-img"></div>
                        <div class="date-container">
                            <div id="datePickerEnd" class="date-picker datePicker"></div>
                            <div class="picker-control">
                                <button type="button" class="date-clear-button">清除</button>
                                <button type="button" class="date-check-button">確認</button>
                            </div>
                        </div>
                        <ul class="time-list">
                            <li>00:00</li>
                            <li>00:30</li>
                            <li>01:00</li>
                            <li>01:30</li>
                            <li>02:00</li>
                            <li>02:30</li>
                            <li>03:00</li>
                            <li>03:30</li>
                            <li>04:00</li>
                            <li>04:30</li>
                            <li>05:00</li>
                            <li>05:30</li>
                            <li>06:00</li>
                            <li>06:30</li>
                            <li>07:00</li>
                            <li>07:30</li>
                            <li>08:00</li>
                            <li>08:30</li>
                            <li>09:00</li>
                            <li>09:30</li>
                            <li>10:00</li>
                            <li>10:30</li>
                            <li>11:00</li>
                            <li>11:30</li>
                            <li>12:00</li>
                            <li>12:30</li>
                            <li>13:00</li>
                            <li>13:30</li>
                            <li>14:00</li>
                            <li>14:30</li>
                            <li>15:00</li>
                            <li>15:30</li>
                            <li>16:00</li>
                            <li>16:30</li>
                            <li>17:00</li>
                            <li>17:30</li>
                            <li>18:00</li>
                            <li>18:30</li>
                            <li>19:00</li>
                            <li>19:30</li>
                            <li>20:00</li>
                            <li>20:30</li>
                            <li>21:00</li>
                            <li>21:30</li>
                            <li>22:00</li>
                            <li>22:30</li>
                            <li>23:00</li>
                            <li>23:30</li>
                        </ul>
                    </div>
                    <button type="button" class="hidden-button" disabled>　　</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="control-container">
        <button type="submit" class="submit-button">儲存</button>
        <button type="button"  class="down-added-button del">下架</button>
    </div>
</form>
<!-- 提示訊息 -->
<div class="prompt-box-down">
    <div class="prompt">
        <p class="size14">確定要下架嗎?</p>
        <div>
            <button  class="border confirm center">確認</button>
            <button class="border cancel" type="button" >取消</button>
        </div>
    </div>
</div>
<!-- 以上分割 -->
@endsection

@section('js')
<script src={{asset("./thedatepicker-master/dist/the-datepicker.js")}}></script>
<script src={{asset("./thedatepicker-master/dist/dataPicker.js")}}></script>
{{-- 補上js去禁用 --}}
@vite(['resources/js/activityChooseFixPattern.js'])
@vite(['resources/js/activityDel-spe.js'])

<script>
    window.onload = function() {
        var inputTime = new Date(document.getElementById('start-time-input').value);
        var nowTime = new Date();

        // 如果输入时间早于当前时间，则禁用输入框
        if(inputTime < nowTime) {
            document.querySelector('.now-button').disabled = true;
            document.getElementById('start-time-input').disabled = true;
        }
    };
    </script>

@endsection
