<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();

            $table->longText('description')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
