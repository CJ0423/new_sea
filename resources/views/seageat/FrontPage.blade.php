@extends('layouts.seagate-templete')


@section('title')
後端管理-首頁管理
@endsection

@section('css')
@vite(['resources/css/frontpage.scss'])
@endsection



@section('cut')
<div class="size16">首頁管理</div>
<div class="border border-0 card">
    <div class="frame-2">
        <div class="size12">選單管理列表</div>
        <a href={{route('CreateMenu')}} class="button-establish">
            <img class="icon-outline-plus" src={{asset("img/icon-outline-plus-22.svg")}} />
            <div class="text-2">建立選單</div>
        </a>
    </div>
    <form action="" method="post">
        <div class="frame-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">編號</th>
                        <th scope="col">主選單名稱</th>
                        <th scope="col">主選單連結</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-bottom">
                        <th scope="row">1</th>
                        <td>限時主打活動</td>
                        <td>
                            https://www.pchomeec.tw/sites/seagate?utm_source=google&utm_medium=cpc&utm_campaign=fq2_cacafly_sem
                        </td>
                        <td><a href={{route("EditMenu")}} class="border border-0 button-revise" >修改</a></td>
                    </tr>
                    <tr class="border-bottom">
                        <th scope="row">2</th>
                        <td>限時主打活動</td>
                        <td>
                            https://www.pchomeec.tw/sites/seagate?utm_source=google&utm_medium=cpc&utm_campaign=fq2_cacafly_sem
                        </td>
                        <td><input type="button" class="border border-0 button-revise" value="修改"></td>
                    </tr>
                    <tr class="border-bottom">
                        <th scope="row">3</th>
                        <td>限時主打活動</td>
                        <td>
                            https://www.pchomeec.tw/sites/seagate?utm_source=google&utm_medium=cpc&utm_campaign=fq2_cacafly_sem
                        </td>
                        <td><input type="button" class="border border-0 button-revise" value="修改"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

<div class="border border-0 card">
    <div class="frame-2">
        <div class="size12">ICON設定</div>
    </div>
    <form action="" method="post">
        <div class="frame-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">編號</th>
                        <th scope="col">ICON名稱</th>
                        <th scope="col">主選單連結</th>
                        <th scope="col">主選單連結</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-bottom">
                        <th scope="row">1</th>
                        <td>Internal HDD</td>
                        <td><textarea name="" id=""
                                class="link">https://www.pchomeec.tw/sites/seagate?utm_source=google&utm_medium=cpc&utm_campaign=fq2_cacafly_se</textarea>
                        </td>
                        <td class="upload-td">
                            <label for="upload01" class="border upload-label">選擇檔案</label>
                            <input type="file" name="upload" id="upload01" class="upload-input">
                        </td>
                        <td><input type="button" class="border button-store" value="儲存"></td>
                    </tr>
                    <tr class="border-bottom">
                        <th scope="row">2</th>
                        <td>IronWolf Pro NT launch</td>
                        <td><textarea name="" id=""
                                class="link">https://www.seagate-disty.com/tw/zh/firecuda/</textarea></td>
                        <td class="upload-td">
                            <label for="upload02" class="border upload-label">選擇檔案</label>
                            <input type="file" name="upload" id="upload02" class="upload-input">
                        </td>
                        <td><input type="button" class="border button-store" value="儲存"></td>
                    </tr>
                    {{-- 這個要六個 --}}
                </tbody>
            </table>
        </div>
    </form>
</div>
@endsection
