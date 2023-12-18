<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ActivityController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 验证规则
        ]);

        // 处理 'computer' 文件上传
        if ($request->hasFile('computer')) {
            $computerFile = $request->file('computer');
            // 存储文件并获取存储路径，文件将保存在 'storage/app/public/files'
            $computerFilePath = $computerFile->store('public/img/activity');
            // 处理路径，以便在 Web 上使用
            $validatedData['computer_file_path'] = substr($computerFilePath, 7); // 去除 'public/' 部分
        }

        // 处理 'phone' 文件上传
        if ($request->hasFile('phone')) {
            $phoneFile = $request->file('phone');
            // 存储文件并获取存储路径，文件将保存在 'storage/app/public/uploads'
            $phoneFilePath = $phoneFile->store('public/img/activity');
            // 处理路径，以便在 Web 上使用
            $validatedData['phone_file_path'] = substr($phoneFilePath, 7); // 去除 'public/' 部分
        }

        // 类似地处理其他文件

        // 保存数据到数据库
        DB::table('activity')->insert([
            'img_pc_url' => $validatedData['computer_file_path'],
            'img_pad_url' => $validatedData['phone_file_path'],
            'img_size_pc' => $request->input('img_size_pc'),
            'img_size_pad' => $request->input('img_size_pad'),
            'button_name' => $request->input('button_name'),
            'button_link' => $request->input('button_link'),
            'subtitle' => $request->input('subtitle'),
            'title' => $request->input('title'),

            // 時間的部分...
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        return redirect(route('activity'));
    }
}
