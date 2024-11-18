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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('service_type', ['генеральная уборка','уборка после ремонта', 'уборка офиса']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('date_pass');
            $table->string('adress');
            $table->enum('status', ['Новая','Подтверждена','Отклонена']);
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
        Schema::dropIfExists('applications');
    }
};
