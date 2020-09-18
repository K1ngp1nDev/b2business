<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('main_photo')->nullable();
            $table->text('photos')->nullable();
            $table->double('price')->default(0);
            $table->double('count')->default(1);
            $table->integer('views')->default(0);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_promoted')->default(false);
            $table->dateTime('expiration')->nullable();
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
        Schema::table('offers', function (Blueprint $table){
            $table->dropForeign('offers_creator_id_foreign');
        });
        Schema::dropIfExists('offers');
    }
}
