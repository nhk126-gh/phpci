<?php

use Illuminate\Database\Seeder;

class BbsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=10;$i++){
            for($j=1;$j<=2;$j++){
                DB::table('bbs')->insert([
                'user_id'=>$i,
                'comment'=>'comment'.$j
                ]);
            }
        }
    }
}
