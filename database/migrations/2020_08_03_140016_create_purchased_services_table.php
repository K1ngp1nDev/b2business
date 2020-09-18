<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasedServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entity_id');
//            $table->foreign('entity_id')->references('id')->on('companies')->onDelete('cascade');
//            $table->foreign('entity_id')->references('id')->on('offers')->onDelete('cascade');
            $table->string('entity_table');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::table('purchased_services', function (Blueprint $table){
            $table->dropForeign('purchased_services_user_id_foreign');
            $table->dropForeign('purchased_services_service_id_foreign');
        });
        Schema::dropIfExists('purchased_services');
    }
}
