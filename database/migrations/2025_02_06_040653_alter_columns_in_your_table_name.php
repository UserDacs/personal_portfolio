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
        Schema::table('user_skills', function (Blueprint $table) {
            $table->text('back_end')->nullable()->change();
            $table->text('front_end')->nullable()->change();
            $table->text('server_side')->nullable()->change();
            $table->text('years_exp')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_skills', function (Blueprint $table) {
            $table->string('back_end')->nullable(false)->change();
            $table->string('front_end')->nullable(false)->change();
            $table->string('server_side')->nullable(false)->change();
            $table->string('years_exp')->nullable(false)->change();
        });
    }
};
