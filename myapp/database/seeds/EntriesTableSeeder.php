<?php

use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=6;$i<=10;$i++){
            $faker = Faker\Factory::create('ja_JP');

            DB::table('entries')->insert([
                'title'=>'entry' . $i,
                'content'=>$faker->userName,
                'add'=>'add' . $i,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
        }





    }
}
