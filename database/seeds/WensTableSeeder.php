<?php

use Illuminate\Database\Seeder;
use App\Wen;

class WensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // 首先，清空表
        DB::table('wens')->delete(); 

        // 创建两个测试数据
        Wen::create(array(
            'title' => '重要通知',
            'text' => '其实上面都没有',
        ));

        Wen::create(array(
            'title' => '一些警告',
            'text' => '还是没有内容',
        ));
    }
}
