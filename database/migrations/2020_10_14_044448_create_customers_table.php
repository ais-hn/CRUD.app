<?php
/**
 * 顧客テーブルのマイグレーション。
 */
namespace Database\migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 顧客テーブルMigrationのクラス。
 */
class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //顧客のテーブル設計
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('ID');
            $table->string('last_name', 255)->comment('姓');
            $table->string('first_name', 255)->comment('名');
            $table->string('last_kana', 255)->comment('姓かな');
            $table->string('first_kana', 255)->comment('名かな');
            $table->integer('gender')->unsigned()->comment('性別');
            $table->dateTime('birthday')->comment('生年月日');
            $table->string('post_code', 255)->comment('郵便番号');

            $table->integer('pref_id')->unsigned()->comment('都道府県ID');
            //外部キー制約
            $table->foreign('pref_id')->references('id')->on('prefs');

            $table->string('address', 255)->comment('住所');
            $table->string('building', 255)->nullable()->comment('建物名');
            $table->string('tel', 255)->comment('電話番号');
            $table->string('mobile', 255)->comment('携帯電話');

            $table->string('email', 255)->comment('メールアドレス');
            //ユニークメソッド
            $table->unique('email', 'customers_email_unique');

            $table->text('remarks')->nullable()->comment('備考');
            $table->timestamp('created_at')->useCurrent()->comment('作成日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
