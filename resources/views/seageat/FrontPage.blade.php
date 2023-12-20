@extends('layouts.seagate-templete')


@section('title')
後端管理-首頁管理
@endsection

@section('css')
@vite(['resources/css/frontpage.scss'])
<style>
    *{
      /* vertical-align: 10% */
    }
    .height-100{
        vertical-align:middle;
    }
</style>
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

                    {{-- {{dd($menus)}} --}}
                    @foreach ($menus as $index=> $item )
                    <tr class="border-bottom">
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$item->menu_name}}</td>
                        <td>
                            {{$item->menu_link}}
                        </td>
                        <td><a href={{route("EditMenu",['id'=>$item->id])}} class="border border-0 button-revise" >修改</a></td>
                    </tr>
                    @endforeach

                    {{-- <tr class="border-bottom">
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
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </form>
</div>

<div class="border border-0 card">
    <div class="frame-2">
        <div class="size12">ICON設定</div>
    </div>
    <form id="my-form" action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input class="idicon" type="hidden" name="id" >
        <div class="frame-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">編號</th>
                        <th scope="col">ICON名稱</th>
                        <th scope="col">主選單連結</th>
                        <th scope="col">主選單連結</th>
                        <th scope="col">圖片預覽</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $icons as $index=>$item )
                    <tr class="border-bottom">
                        {{-- <input type="hidden" name="id"> --}}
                        <th class="height-100" scope="row">1</th>
                        <td class="height-100">
                            <textarea name="icon_name{{$item->id}}" class="name" style="resize:none;">{{$item->icon_name}}</textarea></td>
                        <td  class="height-100">

                            <textarea style="height: 75px" name="icon_url{{$item->id}}" id=""
                                class="link">{{$item->icon_url}}</textarea>
                        </td>
                        <td class="upload-td height-100">
                            <label style="position: relative;
                            top: 20px;" for="upload01" class="border upload-label">選擇檔案</label>

                            <input style="position: relative;
                            top: 0px;" sty type="file" name="upload{{$item->id}}" id="upload01" class="upload-input isup" accept="image/png, image/jpeg, image/gif">
                        </td>
                        <td class="height-100">
                            <img style="max-height:100px;max-width:100px;" src="{{asset('storage/'.$item->icon_img)}}" alt="">
                        </td>

                        <td class="height-100">

                            <button  data-key="{{route('icon.update', $item->id) }}" type="button" disabled  class="border button-store"  >儲存
                        </button>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>

</div>
@endsection
@section('js')
@vite(['resources/js/fontpageicon.js',])

@endsection

