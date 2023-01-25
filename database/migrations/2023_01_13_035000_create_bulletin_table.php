<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('committee_ID');
            $table->foreign('committee_ID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('author_name');
            $table->string('news_title');
            $table->longText('news_description');
            $table->string('updateBy')->nullable();
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
        Schema::dropIfExists('bulletin');
    }
};
