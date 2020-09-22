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
        //
        // for($i=1;$i<=10;$i++){
        //     DB::table('users')->insert([
        //         'name'=>'user'.$i,
        //         'email'=>'test'.$i.'@example.com',
        //         'password'=>Hash::make('12345678')
        //     ]);
        // }

        DB::table('users')->insert([
            'name'=>'oresama',
            'email'=>'test@example.com',
            'password'=>Hash::make('myapp1504')
        ]);
        
        for($i=1;$i<=1;$i++){
            DB::table('users')->insert([
                'name'=>'simobe'.$i,
                'email'=>'test'.$i.'@example.com',
                'password'=>Hash::make('myapp1504')
            ]);
        }

    }
}
