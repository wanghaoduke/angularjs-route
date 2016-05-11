<?php

use Illuminate\Database\Seeder;
use App\Comment;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      DB::table('comments')->delete();

      Comment::create(array(
        'user'=>'张三',
        'comm'=>'上来的快放假了双方的看见了',
        'wen_id'=>'1'));
      Comment::create(array(
        'user'=>'李四',
        'comm'=>'ldfkjlsakdjf了深刻的风景',
        'wen_id'=>'1'));
      Comment::create(array(
        'user'=>'张wu',
        'comm'=>'上来sddd放假了双方的看见了',
        'wen_id'=>'2'));
      Comment::create(array(
        'user'=>'李ds',
        'comm'=>'ldfkjlsakdjfd深刻f的风景',
        'wen_id'=>'2'));

    }
}
