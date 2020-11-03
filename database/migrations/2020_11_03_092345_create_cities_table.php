<?php
/**
 * 市町村テーブルのマイグレーション。
 */
namespace Database\migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 市町村テーブルMigrationのクラス。
 */
class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @param cities 市区町村テーブル。
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('ID');
            $table->integer('pref_id')->unsigned()->comment('都道府県ID');
            $table->string('name', 128)->comment('市区町村名');
            $table->timestamp('created_at')->useCurrent()->comment('作成日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');
            //外部キー制約
            $table->foreign('pref_id')->references('id')->on('prefs');
            //ユニーク制約
            $table->unique(['id', 'pref_id'], 'cities_id_pref_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
