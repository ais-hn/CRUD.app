<?php
/**
 * DBのSeeder。
 */
namespace Seeds;

use Illuminate\Database\Seeder;

/**
 * DBのSeederのクラス。
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
    }
}
