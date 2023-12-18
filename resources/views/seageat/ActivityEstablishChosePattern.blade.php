@extends('layouts.seagate-templete')


@section('title')
後端管理-建立活動-選擇版型
@endsection

@section('css')
@vite(['resources/css/activityEstablishChosePattern.scss'])
{{-- 檔案名稱要改 --}}
@endsection



@section('cut')
      <!-- 以下分割 -->
       {{-- ActivityPatternSetting --}}
        <div class="text-wrapper-3 size16">選擇版型</div>
        <form action={{route('PatternSetting-create')}}
        method="get">
            <div class="pattern-container">
                <div class="pattern-area">
                    <h4>4格</h4>
                    <div class="pattern-box">
                        <input type="radio" name="pattern" id="patternA-1" value="blockA-1" required>
                        <label class="pattern-choose-label" for="patternA-1">
                            <div class="pattern-box-item pattern-box-item1">
                                <img src={{asset("./img/建立活動-選擇版型/A-1.png")}} alt="pattern-A-1">
                            </div>
                        </label>
                        <input type="radio" name="pattern" id="patternA-2" value="blockA-2" required>
                        <label class="pattern-choose-label" for="patternA-2">
                            <div class="pattern-box-item pattern-box-item2">
                                <img src={{asset("./img/建立活動-選擇版型/A-2.png")}} alt="pattern-A-2">
                            </div>
                        </label>
                        <input type="radio" name="pattern" id="patternA-3" value="blockA-3" required>
                        <label class="pattern-choose-label" for="patternA-3">
                            <div class="pattern-box-item pattern-box-item3">
                                <img src={{asset("./img/建立活動-選擇版型/A-3.png")}} alt="pattern-A-3">
                            </div>
                        </label>
                    </div>
                </div>
                <div class="pattern-area">
                    <h4>5格</h4>
                    <div class="pattern-box">
                        <input type="radio" name="pattern" id="patternB-1" value="blockB-1" required>
                        <label class="pattern-choose-label" for="patternB-1">
                            <div class="pattern-box-item pattern-box-item4">
                                <img src={{asset("./img/建立活動-選擇版型/B-1.png")}} alt="pattern-B-1">
                            </div>
                        </label>
                        <input type="radio" name="pattern" id="patternB-2" value="blockB-2" required>
                        <label class="pattern-choose-label" for="patternB-2">
                            <div class="pattern-box-item pattern-box-item5">
                                <img src={{asset("./img/建立活動-選擇版型/B-2.png")}} alt="pattern-B-2">
                            </div>
                        </label>
                        <input type="radio" name="pattern" id="patternB-3" value="blockB-3" required>
                        <label class="pattern-choose-label" for="patternB-3">
                            <div class="pattern-box-item pattern-box-item6">
                                <img src={{asset("./img/建立活動-選擇版型/B-3.png")}} alt="pattern-B-3">
                            </div>
                        </label>
                    </div>
                </div>
                <div class="pattern-area">
                    <h4>6格</h4>
                    <div class="pattern-box">
                        <input type="radio" name="pattern" id="patternC-1" value="blockC-1" required>
                        <label class="pattern-choose-label" for="patternC-1">
                            <div class="pattern-box-item pattern-box-item7">
                                <img src={{asset("./img/建立活動-選擇版型/C-1.png")}} alt="pattern-C-1">
                            </div>
                        </label>
                        <input type="radio" name="pattern" id="patternC-2" value="blockC-2" required>
                        <label class="pattern-choose-label" for="patternC-2">
                            <div class="pattern-box-item pattern-box-item8">
                                <img src={{asset("./img/建立活動-選擇版型/C-2.png")}} alt="pattern-C-2">
                            </div>
                        </label>
                        <input type="radio" name="pattern" id="patternD-2" value="blockD-2" required>
                        <label class="pattern-choose-label" for="patternD-2">
                            <div class="pattern-box-item pattern-box-item10">
                                <img src={{asset("./img/建立活動-選擇版型/D-2.png")}} alt="pattern-D-2">
                            </div>
                        </label>
                    </div>
                </div>
                <div class="pattern-area">
                    <h4>7格</h4>
                    <div class="pattern-box">
                        <input type="radio" name="pattern" id="patternD-1" value="blockD-1" required>
                        <label class="pattern-choose-label" for="patternD-1">
                            <div class="pattern-box-item pattern-box-item9">
                                <img src={{asset("./img/建立活動-選擇版型/D-1.png")}} alt="pattern-D-1">
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="submit-container">
                <a href={{route('activity')}} class="clear-change-button">
                    捨棄修改
                </a>
                <button type="submit" class="apply-change-button">
                    套用版型
                </button>

            </div>
        </form>
        <div class="prompt-box">
            <h4>請選擇版型</h4>
            <button type="button" class="close-prompt-box">確認</button>
        </div>
      <!-- 以上分割 -->
@endsection
