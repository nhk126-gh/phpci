<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i=1;$i<=3;$i++){
            DB::table('users')->insert([
                'name'=>'user'.$i,
                'email'=>'test'.$i.'@example.com',
                'password'=>Hash::make('12345678')
            ]);
        }


    }
}
