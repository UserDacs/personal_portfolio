<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
            CREATE PROCEDURE FUNCTION_CHANNEL(IN channelId INT)
            BEGIN
                SELECT
                    s.id AS sender_id,
                    s.`name` AS sender_name,
                    s.`subject` AS sender_sub,
                    s.body AS sender_body,
                    s.recipient_email AS sender_email,
                    s.is_read,
                    s.`status`,
                    CASE 
                        WHEN TIMESTAMPDIFF(SECOND, s.created_at, NOW()) < 86400 THEN 'Today'
                        WHEN TIMESTAMPDIFF(DAY, s.created_at, NOW()) = 1 THEN '1 day ago'
                        WHEN TIMESTAMPDIFF(DAY, s.created_at, NOW()) < 7 THEN CONCAT(TIMESTAMPDIFF(DAY, s.created_at, NOW()), ' days ago')
                        WHEN TIMESTAMPDIFF(WEEK, s.created_at, NOW()) = 1 THEN '1 week ago'
                        WHEN TIMESTAMPDIFF(WEEK, s.created_at, NOW()) < 4 THEN CONCAT(TIMESTAMPDIFF(WEEK, s.created_at, NOW()), ' weeks ago')
                        WHEN TIMESTAMPDIFF(MONTH, s.created_at, NOW()) = 1 THEN '1 month ago'
                        WHEN TIMESTAMPDIFF(MONTH, s.created_at, NOW()) < 12 THEN CONCAT(TIMESTAMPDIFF(MONTH, s.created_at, NOW()), ' months ago')
                        WHEN TIMESTAMPDIFF(YEAR, s.created_at, NOW()) = 1 THEN '1 year ago'
                        ELSE CONCAT(TIMESTAMPDIFF(YEAR, s.created_at, NOW()), ' years ago')
                    END AS formatted_created_at,
                    DATE_FORMAT(s.created_at, '%b %e, %Y %l:%i %p') AS full_created_at,
                    DATE_FORMAT(s.created_at, '%a, %b %e %l:%i %p') AS no_year_created_at,
                    UPPER(LEFT(s.name, 1)) AS sender_initial,
                    c.id AS channel_id,
                    c.`name` AS channel_name,
                    c.`type` AS channel_type
                FROM send_emails s 
                LEFT JOIN channels c ON c.`name` = s.`subject` 
                WHERE c.id = channelId
                ORDER BY s.created_at DESC;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS FUNCTION_CHANNEL");
    }
};
