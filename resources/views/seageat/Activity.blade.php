@extends('layouts.seagate-templete')


@section('title')
後端管理-活動列表
@endsection

@section('css')
@vite(['resources/css/activity.scss'])
@endsection
{{-- {{dd($activities)}} --}}

@section('cut')
     <!-- 以下分割 -->
     <div class="size16">活動列表</div>
     <div class="border border-0 card">

       <!-- 提示訊息 -->
       <!-- <div class="prompt-box-down">
         <div class="prompt">
           <p class="size14">確定要下架嗎?</p>
           <div>
             <input class="border confirm" type="button" value="確認">
             <input class="border cancel" type="button" value="取消">
           </div>
         </div>
       </div> -->

       <div class="frame-2">
         <div class="size12">活動資訊</div>
         <div>
             <a href={{route('ActivityEstablish')}} class="button-establish">
               <img class="icon-outline-plus" src={{asset('img/icon-outline-plus-22.svg') }}>
               <div class="text-2">建立活動</div>
             </a>
             <a href={{route('ChosePattern')}} class="button-establish">
               <img class="icon-outline-plus" src={{asset('img/icon-outline-plus-22.svg')}}>
               <div class="text-2">選擇版型</div>
             </a>
         </div>
       </div>
       <form action="" method="post">
         <div class="frame-3">
           <table class="table">
             <thead>
               <tr>
                 <th scope="col">活動編號</th>
                 <th scope="col">活動範圍</th>
                 <th scope="col">主標題</th>
                 <th scope="col">版型編號</th>
                 <th scope="col">狀態</th>
                 <th scope="col">操作</th>
               </tr>
             </thead>
             <tbody>
                {{-- 因為要使用index因此需要補上 --}}
                @foreach ($activities as $index=>$item )
                <tr class="border-bottom">
                    <th scope="row">{{$index+1}}</th>
                    <td><img src={{asset('storage/'.$item->img_pc_url)}} alt=""></td>
                    <td>{{$item->title}}</td>
                    <td>
                       <a href={{route('ActivityPatternSetting')}} class="version-id">B-3</a>
                       {{-- 後面要補上id --}}
                   </td>
                    <td>排程上架</td>
                    <td>
                      <div class="operate">
                          <a id="{{$item->id}}" href={{route('ActivityRevise')}} class="border border-0 button-edit" >編輯</a>
                      </div>
                    </td>
                  </tr>
                @endforeach

             </tbody>
           </table>
         </div>


       </form>
     </div>
@endsection
