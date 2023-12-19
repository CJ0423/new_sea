<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icon')->insert([
            [
                'icon_name' => 'Icon 1',
                'icon_url' => 'http://example.com/icon1',
                'icon_img' => 'icon1.jpg'
            ],
            [
                'icon_name' => 'Icon 2',
                'icon_url' => 'http://example.com/icon2',
                'icon_img' => 'icon2.jpg'
            ],
            // 可以添加更多图标数据
        ]);
    }
}
