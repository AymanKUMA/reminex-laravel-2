<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id('id_slide');
            $table->string('title', 50);
            $table->string('subtitle', 50);
            $table->longText('description');
            $table->string('layout');
            $table->foreignId('updated_by')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE slides ADD image MEDIUMBLOB");
        DB::statement("ALTER TABLE slides ADD CONSTRAINT layout_options CHECK(layout IN('right','left'))");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
};
