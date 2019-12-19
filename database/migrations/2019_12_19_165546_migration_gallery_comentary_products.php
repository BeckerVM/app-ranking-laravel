<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationGalleryComentaryProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_comentary_products', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('img_url');
            $table->unsignedInteger('comentaryproduct_id');
            $table->foreign('comentaryproduct_id')->references('id')->on('comentary_products')->onDelete('cascade');
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
        //
    }
}
