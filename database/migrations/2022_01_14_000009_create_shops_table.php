<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("owner_id");
            $table->unsignedBigInteger("genre_id");
            $table->unsignedBigInteger("area_id");
            $table->string("name",255);
            $table->string("overview",255);
            $table->string("image",255);
            $table->timestamp("created_at")->useCurrent()->nullable();
            $table->timestamp("updated_at")->useCurrent()->nullable();

            $table->foreign("owner_id")->references("id")->on("owners")->onDelete("cascade");
            $table->foreign("genre_id")->references("id")->on("genres")->onDelete("cascade");
            $table->foreign("area_id")->references("id")->on("areas")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
