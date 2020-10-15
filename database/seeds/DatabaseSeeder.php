<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //prefsのseederで初期の都道府県を呼び込む。
        $this->call(PrefsTableSeeder::class);
    }
}
