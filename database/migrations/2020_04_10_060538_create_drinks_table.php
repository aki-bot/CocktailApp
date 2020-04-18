<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //以下のデータを保存したい内容を書いたら「php artisan migrate」でデータを実行させる
        Schema::create('drinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); //保存したいデータをここで追加して書く/名前
            $table->string('sub');//サブタイトル
            $table->string('how');// 度数
            $table->string('thing');//レシピ
            $table->string('body');//解説
            $table->string('all');//総合評価
            $table->string('image_path')->nullable();//これは写真の保存のカラム
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
}
