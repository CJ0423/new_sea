<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Front_page_menu extends Controller
{
    public function store(Request $request)
    {
        $requestArray = $request->all();
        // dd($requestArray);
        $requestArrayLength = count($requestArray) - 3; //重複次數剛好減少4就是要存儲的資料數
        // dd($requestArray);
        // dd($requestArrayLength);
        $chosePatternId = DB::table('menu')->insertGetId([
            //開始
            'menu_name' => $request->input('menu_name'),
            //結尾
            'menu_link' => $request->input('menu_link'),
            // 時間的部分...
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        for ($i = 0; $i < $requestArrayLength / 2; $i++) {
            $menuName = $request->input('child_menu' . $i);
            $menuLink = $request->input('menu_link' . $i);

            // dd($menuName);
            // 检查 menu_name 和 menu_link 是否非空
            DB::table('childmenu')->insert([
                'menu_name' => $menuName, // 使用变量
                'menu_link' => $menuLink, // 使用变量
                'menu_id' => $chosePatternId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        return redirect(route('Front_page'));
    }
    public function show()
    {
        $data = 1;
        return view(route('Front_page'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $requestArray = $request->all();
        // dd($requestArray);
        $requestArrayLength = count($requestArray) - 4; //重複次數剛好減少4就是要存儲的資料數
        // dd($requestArray);


        // dd($requestArray);
        // dd($requestArrayLength);
        $chosePatternId = DB::table('menu')->where('id', $id)->update([
            //開始
            'menu_name' => $request->input('menu_name'),
            //結尾
            'menu_link' => $request->input('menu_link'),
            // 時間的部分...
            // 'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        for ($i = 0; $i < 4; $i++) {
            $menuName = $request->input('child_menu' . $i);
            $menuLink = $request->input('menu_link' . $i);
            $menuId = $request->input('child_menu_id' . $i);

            // dd($menuId);

            // dd($menuName);
            // 检查 menu_name 和 menu_link 是否非空
            DB::table('childmenu')->where('id', $menuId)->update([
                'menu_name' => $menuName, // 使用变量
                'menu_link' => $menuLink, // 使用变量
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }


        return redirect(route('Front_page'));
    }
}
