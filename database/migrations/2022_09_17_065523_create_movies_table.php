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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('trailer');
            $table->string('slug');
            $table->string('casts');
            $table->string('categories');
            $table->string('small_thumbnail');
            $table->string('large_thumbnail');
            $table->date('release_date');
            $table->string('description');
            $table->text('long_description');
            $table->string('duration');
            $table->boolean('is_featured')->default(false);
            $table->string('rating');
            $table->boolean('is_active')->default(false);



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
        Schema::dropIfExists('movies');
    }
};
