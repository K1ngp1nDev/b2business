<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            $table->foreignId('seller_id');
            $table->foreign('seller_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreignId('customer_id');
            $table->foreign('customer_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign('chats_offer_id_foreign');
            $table->dropForeign('chats_seller_id_foreign');
            $table->dropForeign('chats_customer_id_foreign');
        });
        Schema::dropIfExists('chats');
    }
}
