<?php
/**
 * 顧客テーブルの市区町村カラムの追加マイグレーション。
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 市区町村カラムの追加Midrationのクラス。
 */
class AddCityIdCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->integer('city_id')->unsigned()->comment('市区町村ID')->after('pref_id');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('city_id');
        });
    }
}
