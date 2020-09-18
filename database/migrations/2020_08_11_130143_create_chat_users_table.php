<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_id');
            $table->foreign('chat_id')->references('id')->on('chats');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('chat_users', function (Blueprint $table) {
            $table->dropForeign('chat_users_chat_id_foreign');
            $table->dropForeign('chat_users_user_id_foreign');
        });
        Schema::dropIfExists('chat_users');
    }
}
