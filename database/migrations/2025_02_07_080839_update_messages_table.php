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
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('content'); // Remove the 'content' column
            $table->foreignId('send_email_id')->constrained('send_emails')->onDelete('cascade'); // Add 'send_email_id' as foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['send_email_id']); // Remove foreign key
            $table->dropColumn('send_email_id'); // Remove column
            $table->text('content'); // Re-add 'content' column if rolled back
        });
    }
};
