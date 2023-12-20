<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Banner extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            // 验证规则
        ]);
        // 处理 'computer' 文件上传
        if ($request->hasFile('computer')) {
            $computerFile = $request->file('computer');
            // 存储文件并获取存储路径，文件将保存在 'storage/app/public/files'
            $computerFilePath = $computerFile->store('public/img/banner');
            // 处理路径，以便在 Web 上使用

            $validatedData['computer_file_path'] = substr($computerFilePath, 7); // 去除 'public/' 部分
        }

        // 处理 'phone' 文件上传
        if ($request->hasFile('phone')) {
            $phoneFile = $request->file('phone');
            // 存储文件并获取存储路径，文件将保存在 'storage/app/public/uploads'
            $phoneFilePath = $phoneFile->store('public/img/banner');
            // 处理路径，以便在 Web 上使用
            $validatedData['phone_file_path'] = substr($phoneFilePath, 7); // 去除 'public/' 部分
        }

        // 类似地处理其他文件

        // 保存数据到数据库
        DB::table('banner_table')->insert([
            'img_pc_url' => $validatedData['computer_file_path'],
            'img_pad_url' => $validatedData['phone_file_path'],
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),

            'button_name' => $request->input('button_name'),
            'button_link' => $request->input('button_link'),

            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'Rank' => $request->input('rank'),

            // 時間的部分...
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        return redirect(route('Banner'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // 验证规则
        ]);

        // 檢查活動是否存在
        $activity = DB::table('activity')->where('id', $id)->first();
        if (!$activity) {
            // dd("測試");
            // return redirect()->back()->with('error', 'Activity not found.');
        }

        // 處理 'computer' 文件上傳
        if ($request->hasFile('computer')) {

            $computerFile = $request->file('computer');
            $computerFilePath = $computerFile->store('public/img/banner');
            $validatedData['computer_file_path'] = substr($computerFilePath, 7);
            DB::table('banner_table')->update([
                'img_pc_url' => $validatedData['computer_file_path']
            ]);
        }

        // 處理 'phone' 文件上傳
        if ($request->hasFile('phone')) {
            $phoneFile = $request->file('phone');
            $phoneFilePath = $phoneFile->store('public/img/banner');
            $validatedData['phone_file_path'] = substr($phoneFilePath, 7);
            DB::table('banner_table')->update([
                'img_pad_url' => $validatedData['phone_file_path'],
            ]);
        }

        // 更新資料庫
        // dd($request->all());
        DB::table('banner_table')->update([


            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),

            'button_name' => $request->input('button_name'),
            'button_link' => $request->input('button_link'),

            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'Rank' => $request->input('rank'),

            // 時間的部分...
            'updated_at' => Carbon::now()
        ]);

        return redirect(route('Banner'));
    }
}
