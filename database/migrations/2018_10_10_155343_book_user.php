<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
 Schema::create('book_user', function (Blueprint $table)
 {
         $table->increments('id');
     $table->integer('book_id')->unsigned()->nullable()->index();
            $table->integer('user_id')->unsigned()->nullable()->index();
           
             $table->timestamps();
});
    
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('book_user');
    }
}
