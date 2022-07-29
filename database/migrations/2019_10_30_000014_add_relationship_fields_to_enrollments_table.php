<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEnrollmentsTable extends Migration
{
    public function up()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_fk_538851')->references('id')->on('users');

            $table->unsignedInteger('committee_id');

            $table->foreign('committee_id', 'committee_fk_538852')->references('id')->on('committees');
            
            $table->unsignedInteger('portfolio_id')->nullable();

            $table->foreign('portfolio_id', 'portfolio_fk_538818')->references('id')->on('portfolios');
        });
    }
}
