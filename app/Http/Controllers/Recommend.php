<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Recommend extends Controller
{
    //上傳的部分
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 验证规则
        ]);




        // 处理 'computer' 文件上传
        if ($request->hasFile('logo_url')) {
            $logo_urlFile = $request->file('logo_url');
            // 存储文件并获取存储路径，文件将保存在 'storage/app/public/files'
            $logo_urlFilePath = $logo_urlFile->store('public/img/recommend');
            // 处理路径，以便在 Web 上使用
            $validatedData['logo_url'] = substr($logo_urlFilePath, 7); // 去除 'public/' 部分


            // 保存数据到数据库
            DB::table('recommend')->insert([

                'logo_url' =>  $validatedData['logo_url'],
                'logo_name' => $request->input('logo_name'),
                'logo_link' => $request->input('logo_link'),


                // 時間的部分...
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // 类似地处理其他文件



        // return redirect(route('Recommend'));
    }



    public function update(Request $request, $id)
    {
        // dd($id);

        $validatedData = $request->validate([
            // 验证规则
        ]);

        // 檢查活動是否存在
        $activity = DB::table('activity')->where('id', $id)->first();
        if (!$activity) {
            return redirect()->back()->with('error', 'Activity not found.');
        }

        // 處理 'computer' 文件上傳
        if ($request->hasFile('computer')) {
            $computerFile = $request->file('computer');
            $computerFilePath = $computerFile->store('public/img/activity');
            $validatedData['img_pc_url'] = substr($computerFilePath, 7);
        }

        // 處理 'phone' 文件上傳
        if ($request->hasFile('phone')) {
            $phoneFile = $request->file('phone');
            $phoneFilePath = $phoneFile->store('public/img/activity');
            $validatedData['img_pad_url'] = substr($phoneFilePath, 7);
        }

        // 更新資料庫
        DB::table('activity')->where('id', $id)->update([
            'img_pc_url' => $validatedData['img_pc_url'] ?? $activity->img_pc_url,
            'img_pad_url' => $validatedData['img_pad_url'] ?? $activity->img_pad_url,
            'img_size_pc' => $request->input('img_size_pc'),
            'img_size_pad' => $request->input('img_size_pad'),
            'button_name' => $request->input('button_name'),
            'button_link' => $request->input('button_link'),
            'subtitle' => $request->input('subtitle'),
            'title' => $request->input('title'),
            'updated_at' => Carbon::now()
        ]);

        return redirect(route('activity'));
    }
}
// 更新 路由 上傳都還沒好
