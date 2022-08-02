<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitteePortfolioPivotTable extends Migration
{
    public function up()
    {
        Schema::create('committee_portfolio', function (Blueprint $table) {
            $table->unsignedInteger('committee_id');

            $table->foreign('committee_id', 'committee_id_fk_538848')->references('id')->on('committees')->onDelete('cascade');

            $table->unsignedInteger('portfolio_id');

            $table->foreign('portfolio_id', 'portfolio_id_fk_538846')->references('id')->on('portfolios')->onDelete('cascade');
        });
    }
}
