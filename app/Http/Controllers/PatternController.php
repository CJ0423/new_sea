<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PatternController extends Controller
{
    public function store(Request $request)
    {


        $requestArray = $request->all();
        $requestArrayLength = count($requestArray) - 4; //重複次數剛好減少4就是要存儲的資料數
        // dd($requestArray);
        $whitch_pattern = str_replace('block', '', $requestArray['whitch_pattern']); //轉換成可以存儲在DB內的資料
        // dd($whitch_pattern);

        // dd($requestArray);
        // dd($requestArrayLength);
        $chosePatternId = DB::table('chose_pattern')->insertGetId([
            //開始
            'start_time' => $request->input('start-time-input'),
            //結尾
            'end_time' => $request->input('end-time-input'),
            //共有幾格
            'how_many_space' => $requestArrayLength,
            //哪一個
            'whitch_pattern' => $whitch_pattern,
            //第幾個圖片
            'number_of_pattern' => 0,
            //抓取圖片
            // 'activity_id' => $request->input('no' . $i),

            // 時間的部分...
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        for ($i = 1; $i <= $requestArrayLength; $i++) {
            DB::table('pattern_table')->insert([

                //第幾個圖片
                'chose_pattern_id' => $chosePatternId, // 注意這裡使用了 $chosePatternId
                //抓取圖片
                'activity_id' => $request->input('no' . $i),

                // 時間的部分...
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect(route('activity'));
    }

    public function update(Request $request, $id)
    {
        $requestArray = $request->all();
        // dd($requestArray);
        // dd($requestArray);
        $requestArrayLength = count($requestArray) - 5;


        // 假设 $id 是 chose_pattern 的 ID
        DB::table('chose_pattern')->where('id', $id)->update([
            'start_time' => $request->input('start-time-input'),
            'end_time' => $request->input('end-time-input'),
            // 其他需要更新的字段...
            'updated_at' => Carbon::now()
        ]);

        // dd($id);

        // 更新 pattern_table 的记录
        // 这里需要一种方法来确定如何更新每条记录

        $dataUpdate = DB::table('pattern_table')->where('chose_pattern_id', $id)->get();

        // dd($dataUpdate);
        $data = [];
        foreach ($dataUpdate as $index => $item) {
            $data[$index] = $item->id;
        }

        // dd($data);
        for ($i = 0; $i < $requestArrayLength; $i++) {
            $activityId = $request->input('no' . ($i + 1));

            // 定位到特定顺序的记录并更新
            DB::table('pattern_table')
                ->where('chose_pattern_id', $id)
                ->where('id', $data[$i])
                ->update([
                    'activity_id' => $activityId,
                    'updated_at' => Carbon::now()
                ]);
        }


        return redirect(route('activity'));
    }
}
