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
       
    //    factory(App\Model\User::class,10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(statusProductTableSeeder::class);
    }
}
