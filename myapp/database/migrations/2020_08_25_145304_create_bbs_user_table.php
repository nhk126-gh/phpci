<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBbsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbs_user', function (Blueprint $table) {
            
            $table->unsignedInteger('bbs_id');
            $table->unsignedInteger('user_id');
            $table->primary(['bbs_id','user_id']);

            $table->foreign('bbs_id')->references('id')->on('bbs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bbs_user');
    }
}
