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



        return redirect(route('Recommend'));
    }



    public function update(Request $request, $id)
    {
        // dd($id);

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
            DB::table('recommend')->where('id', $id)->update([

                'logo_url' =>  $validatedData['logo_url'],
                'logo_name' => $request->input('logo_name'),
                'logo_link' => $request->input('logo_link'),


                // 時間的部分...
                'updated_at' => Carbon::now()
            ]);
        } else {
            DB::table('recommend')->where('id', $id)->update([

                'logo_name' => $request->input('logo_name'),
                'logo_link' => $request->input('logo_link'),


                // 時間的部分...
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect(route('Recommend'));
    }

    public function destory($id)
    {
        // 找到并删除资源
        DB::table('recommend')->where('id', $id)->delete();

        // 重定向到列表页面或返回响应
        return redirect(route('Recommend'));
    }
}
// 更新 路由 上傳都還沒好
