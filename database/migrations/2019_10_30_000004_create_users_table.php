<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('contact')->nullable();

            $table->string('email')->nullable()->unique();

            $table->datetime('email_verified_at')->nullable();

            $table->string('class')->nullable();

            $table->string('school')->nullable();

            $table->string('city')->nullable();

            $table->string('password')->nullable();

            $table->tinyInteger('payment_mode')->nullable();

            $table->string('remember_token')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
