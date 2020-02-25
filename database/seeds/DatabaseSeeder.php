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
        DB::table('users')->insert([
            'name'     => "Administrator", 
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'type'     => "admin", 
            'status'   => "1"  
        ]);
    }
}
