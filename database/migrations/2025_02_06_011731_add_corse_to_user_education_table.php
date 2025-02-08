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
        Schema::table('user_education', function (Blueprint $table) {
            $table->string('corse')->nullable()->after('schooladdress');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_education', function (Blueprint $table) {
            $table->dropColumn('corse');
        });
    }
};
