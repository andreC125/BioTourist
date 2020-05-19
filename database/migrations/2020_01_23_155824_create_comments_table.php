<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('parent_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
            $table->text('body');
            $table->integer('commentable_id')->unsigned(); 
            $table->string('commentable_type');
            $table->text('comment');
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
     
        Schema::dropIfExists('comments');
    } 
}
