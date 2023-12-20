@extends('layouts.seagate-templete')

@section('title')
後端管理-建立通路
@endsection

@section('css')
@vite(['resources/css/recommendestablish.scss'])
@endsection



@section('cut')
      <!-- 以下分割 -->
   <!-- 以下分割 -->
   <div class="size16">建立通路</div>
   <div class="border border-0 card">
     <div class="frame-2">
       <div class="size12">推薦通路資訊</div>
     </div>
     <div class="frame-3">
       <div class="frame-4">

         <form action={{route("newRecommend")}} method="post" enctype="multipart/form-data">
            @csrf
           <div class="input">
             <div class="base-wrapper">
               <div class="base">
                 <div class="frame-5">
                   <div class="label">Logo上傳</div>
                   <div class="frame-6">
                     <div class="text-wrapper-5">必填</div>
                   </div>
                 </div>
                 <div class="input-field">
                     <label for="logo" class="border logo-label">選擇檔案</label>
                     <input type="file" name="logo_url" id="logo" class="logo-input" accept="image/png, image/jpeg, image/gif" required>
                 </div>
               </div>
             </div>
           </div>
           <div class="input">
             <div class="base-wrapper">
               <div class="base">
                 <div class="frame-5">
                   <div class="label">推薦通路名稱</div>
                   <div class="frame-6">
                     <div class="text-wrapper-5">必填</div>
                   </div>
                 </div>
                 <div class="input-field">
                   <input name="logo_name" type="text" class="border" required>
                 </div>
               </div>
             </div>
           </div>
           <div class="input">
             <div class="base-wrapper">
               <div class="base">
                 <div class="frame-5">
                   <div class="label">推薦通路連結</div>
                   <div class="frame-6">
                     <div class="text-wrapper-5">必填</div>
                   </div>
                 </div>
                 <div class="input-field">
                   <input name="logo_link" type="text" class="border" required>
                 </div>
               </div>
             </div>
           </div>

           <div class="frame-7">
                <button type="button" onclick="window.history.back();" class="border button-3"><div class="text-5">捨棄修改</div></button>
                <button class="border-0 button-2"><div class="text-4">儲存</div></button>
           </div>
         </form>
       </div>
     </div>
   </div>
      <!-- 以上分割 -->
@endsection
