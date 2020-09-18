<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('edrpou');
            $table->string('ipn');
            $table->string('p_c');
            $table->string('company_phone');
            $table->foreignId('director_id');
            $table->foreign('director_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_premium')->default(false);
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
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('companies_director_id_foreign');
        });
        Schema::dropIfExists('companies');
    }
}
