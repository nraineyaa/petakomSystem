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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('ProposalCreator_name');
            $table->string('Proposal_Title');
            $table->date('Proposal_date');
            $table->string('statusbyHOSD')->nullable();
            $table->string('statusbyCoordinator')->nullable();
            $table->string('statusbyDean')->nullable();
            $table->string('Proposal_description');
            $table->string('Proposal_objective');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
};
