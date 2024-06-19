<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('postulerusers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('postuler_id');
            $table->unsignedBigInteger('enseignement_id');
            $table->unsignedBigInteger('experiencepedagogique_id');
            $table->unsignedBigInteger('experienceprofessionnel_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('adequation_id');
            $table->unsignedBigInteger('publication_id');
            $table->unsignedBigInteger('diplome_id');

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('postuler_id')->references('id')->on('postulers')->onDelete('cascade');
            $table->foreign('enseignement_id')->references('id')->on('enseignementuadbs')->onDelete('cascade');
            $table->foreign('experiencepedagogique_id')->references('id')->on('experiencepedagogiques')->onDelete('cascade');
            $table->foreign('experienceprofessionnel_id')->references('id')->on('experienceprofessionels')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('adequation_id')->references('id')->on('adequations')->onDelete('cascade');
            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');
            $table->foreign('diplome_id')->references('id')->on('diplomes')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulerusers');
    }
};
