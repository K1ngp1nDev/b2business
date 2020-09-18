<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_regions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->foreignId('region_id');
            $table->foreign('region_id')->references('id')->on('regions');
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
        Schema::table('offer_regions', function (Blueprint $table) {
            $table->dropForeign('offer_regions_offer_id_foreign');
            $table->dropForeign('offer_regions_region_id_foreign');
        });
        Schema::dropIfExists('offer_regions');
    }
}
