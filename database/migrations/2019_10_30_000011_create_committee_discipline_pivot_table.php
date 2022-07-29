<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitteeDisciplinePivotTable extends Migration
{
    public function up()
    {
        Schema::create('committee_discipline', function (Blueprint $table) {
            $table->unsignedInteger('committee_id');

            $table->foreign('committee_id', 'committee_id_fk_538847')->references('id')->on('committees')->onDelete('cascade');

            $table->unsignedInteger('discipline_id');

            $table->foreign('discipline_id', 'discipline_id_fk_538856')->references('id')->on('disciplines')->onDelete('cascade');
        });
    }
}
