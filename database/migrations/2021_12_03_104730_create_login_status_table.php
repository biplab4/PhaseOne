<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //for updating last login status check
    public function up()
    {
        Schema::create('login_status', function (Blueprint $table) {
          $table-> string('email');
          $table->timestamp("last_online_at")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_status');
    }
}
