<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQRRedirectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('q_r_redirects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("soureURL");
            $table->string("destinyURL");
            $table->boolean("active")->default(true);
            $table->bigInteger("user_id")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('q_r_redirects');
    }
}
