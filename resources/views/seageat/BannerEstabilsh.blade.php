@extends('layouts.seagate-templete')
{{ dd($banner) }}

@section('title')
    後端管理-建立Banner
@endsection

@section('css')
    @vite(['resources/css/bannerestablish.scss'])
    <link rel="stylesheet" href={{ asset('./thedatepicker-master/dist/the-datepicker.css') }}>
    {{-- <link rel="stylesheet" href="./css/bannerestablish.css" /> --}}
@endsection



@section('cut')
    <!-- 以下分割 -->
    <div class="size16">建立Banner1</div>
    <div class="border border-0 card">
        <div class="frame-2">
            <div class="size12"></div>
        </div>
        <div class="frame-3">
            <div class="frame-4">

                <form action={{ route('Storebanner') }} method="post" enctype="multipart/form-data">
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
                                    <input type="file" name="computer" id="computer" class="computer-input" required>
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
                                    <input name="title" type="text" class="border">
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
                                    <input name="subtitle" type="text" class="border">
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
                                    <input name="button_name" type="text" class="border">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input">
                        <div class="base-wrapper">
                            <div class="base">
                                <div class="frame-5">
                                    <div class="label">按鍵導入連結</div>
                                </div>
                                <div class="input-field">
                                    <input name="button_link" type="text" class="border">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="area">
                        <div class="label-area">
                            <label for="no4">上架時間</label>
                            <span>必填</span>
                        </div>
                        <div class="select-area">
                            <div class="input-area">
                                <input type="text" class="input-box" name="start_time" id="start-time-input"
                                    autocomplete="off">
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
                        <div class="label-area">
                            <label for="no5">下架時間</label>
                            <span class="hidden-span"></span>
                        </div>
                        <div class="select-area">
                            <div class="input-area">
                                <input type="text" class="input-box" id="end-time-input" autocomplete="off"
                                    name="end_time">
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
                            <button type="button" class="hidden-button" disabled></button>
                        </div>
                    </div>
                    <div class="input">
                        <div class="base-wrapper">
                            <div class="base">
                                <div class="frame-5">
                                    <div class="label">顯示順序</div>
                                    <div class="frame-6">
                                        <div class="text-wrapper-5">必填</div>
                                    </div>
                                </div>
                                <div class="input-field-2">
                                    <select name="rank" id="order" class="order">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="frame-7">
                        <button class="border button-3">
                            <div class="text-5">捨棄修改</div>
                        </button>
                        <button type="submit" class="border-0 button-2">
                            <div class="text-4">儲存</div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- 以上分割 -->
@endsection

@section('js')
    <script src={{ asset('./thedatepicker-master/dist/the-datepicker.js') }}></script>
    <script src={{ asset('./thedatepicker-master/dist/dataPicker.js') }}></script>

    @vite(['resources/js/label.js'])
@endsection
