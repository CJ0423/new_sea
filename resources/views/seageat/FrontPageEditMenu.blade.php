@extends('layouts.seagate-templete')


@section('title')
後端管理-編輯選單
@endsection

@section('css')
@vite(['resources/css/editmenu.scss'])
@endsection



@section('cut')
<div class="size16">修改選單</div>
<div class="border border-0 card">
    <div class="frame-2">
        <div class="size12">選單資訊</div>
    </div>
    <div class="frame-3">
        <div class="frame-4">

            <form action="" method="post">
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
                                <input  type="text" class="border">
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
                                <input type="text" class="border">
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="input">
                    <div class="base-wrapper">
                        <div class="base">
                            <div class="frame-5">
                                <div class="label">子選單名稱</div>
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
                                <div class="label">子選單連結</div>
                            </div>
                            <div class="input-field">
                                <input type="text" class="border">
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="input">
                    <div class="base-wrapper">
                        <div class="base">
                            <div class="frame-5">
                                <div class="label">子選單名稱</div>
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
                                <div class="label">子選單連結</div>
                            </div>
                            <div class="input-field">
                                <input type="text" class="border">
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="input">
                    <div class="base-wrapper">
                        <div class="base">
                            <div class="frame-5">
                                <div class="label">子選單名稱</div>
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
                                <div class="label">子選單連結</div>
                            </div>
                            <div class="input-field">
                                <input type="text" class="border">
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="input">
                    <div class="base-wrapper">
                        <div class="base">
                            <div class="frame-5">
                                <div class="label">子選單名稱</div>
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
                                <div class="label">子選單連結</div>
                            </div>
                            <div class="input-field">
                                <input type="text" class="border">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="frame-7">
                    <button class="border-0 button-2">
                        <div class="text-4">儲存</div>
                    </button>
                    <button class="border button-3">
                        <div class="text-5">捨棄</div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
