<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(App\Language::class, 10)->create();

        factory(App\ProgrammingLanguage::class, 10)->create();

        factory(App\Developer::class, 100)->create()->each(function ($developer){
            $developer->languages()->save(factory(App\Language::class)->make());

        });
    }
}
