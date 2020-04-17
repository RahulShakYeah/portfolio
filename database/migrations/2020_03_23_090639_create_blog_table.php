<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->text('summary');
            $table->string('metatitle');
            $table->string('slug');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->integer('view_count')->default('0');
            $table->string('image')->nullable();
            $table->tinyInteger('is_featured')->default('0');
            $table->foreignId('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreignId('cat_id')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
        Schema::dropIfExists('blogs');
    }
}
