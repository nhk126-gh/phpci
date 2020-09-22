<?php

use Illuminate\Database\Seeder;

class BbsUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bbs_user')->insert([
            'bbs_id'=>1,
            'user_id'=>2
        ]);
    }
}
