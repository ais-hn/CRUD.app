<?php
/**
 * DBのSeeder
 */

use Illuminate\Database\Seeder;

/**
 * DBSeederクラス
 *
 * @package Seeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * PrefsTableSeederで初期の都道府県を呼び込む。
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrefsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
    }
}
