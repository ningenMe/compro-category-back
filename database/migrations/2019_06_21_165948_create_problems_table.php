<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domains_id')->unsigned();
            $table->foreign('domains_id')->references('id')->on('domains');
            $table->char('name', '255');
            $table->string('url', '511')->nullable()->default(null);
            $table->integer('score')->unsigned()->default(0);
            $table->integer('estimation')->unsigned()->default(0);
            $table->string('site', '511')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problems');
    }
}
