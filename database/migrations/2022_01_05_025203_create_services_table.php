<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer("category_id")->nullable();
            $table->integer("user_id")->nullable();
            $table->string("title",150);
            $table->string("keywords")->nullable();
            $table->string("description")->nullable();
            $table->string("image",75)->nullable();
            $table->float("price")->nullable();
            $table->text("detail")->nullable();
            $table->string("slug",100)->nullable();
            $table->string("status",10)->nullable()->default("False");
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
        Schema::dropIfExists('services');
    }
}
