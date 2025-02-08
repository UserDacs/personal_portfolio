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
        DB::statement("
            CREATE VIEW inbox_view AS
           SELECT 
                channels.id AS channel_id,
                channels.name AS channel_name,
                channels.type AS channel_type,
                
                (SELECT COUNT(*) FROM send_emails s WHERE s.subject = channel_name AND is_read = '0') AS unread_count,
                (SELECT s.created_at FROM send_emails s WHERE s.subject = channel_name ORDER BY s.created_at DESC LIMIT 1) AS sub_created_at,
                (SELECT s.name FROM send_emails s WHERE s.subject = channel_name ORDER BY s.created_at DESC LIMIT 1) AS sender_name,
                (SELECT s.body FROM send_emails s WHERE s.subject = channel_name ORDER BY s.created_at DESC LIMIT 1) AS email_body,
                (SELECT s.recipient_email FROM send_emails s WHERE s.subject = channel_name ORDER BY s.created_at DESC LIMIT 1) AS email_subject,
                (SELECT s.status FROM send_emails s WHERE s.subject = channel_name ORDER BY s.created_at DESC LIMIT 1) AS status,

                (SELECT 
                    CASE 
                        WHEN TIMESTAMPDIFF(SECOND, se.created_at, NOW()) < 86400 THEN 'Today'
                        WHEN TIMESTAMPDIFF(DAY, se.created_at, NOW()) = 1 THEN '1 day ago'
                        WHEN TIMESTAMPDIFF(DAY, se.created_at, NOW()) < 7 THEN CONCAT(TIMESTAMPDIFF(DAY, se.created_at, NOW()), ' days ago')
                        WHEN TIMESTAMPDIFF(WEEK, se.created_at, NOW()) = 1 THEN '1 week ago'
                        WHEN TIMESTAMPDIFF(WEEK, se.created_at, NOW()) < 4 THEN CONCAT(TIMESTAMPDIFF(WEEK, se.created_at, NOW()), ' weeks ago')
                        WHEN TIMESTAMPDIFF(MONTH, se.created_at, NOW()) = 1 THEN '1 month ago'
                        WHEN TIMESTAMPDIFF(MONTH, se.created_at, NOW()) < 12 THEN CONCAT(TIMESTAMPDIFF(MONTH, se.created_at, NOW()), ' months ago')
                        WHEN TIMESTAMPDIFF(YEAR, se.created_at, NOW()) = 1 THEN '1 year ago'
                        ELSE CONCAT(TIMESTAMPDIFF(YEAR, se.created_at, NOW()), ' years ago')
                    END
                FROM send_emails se WHERE se.subject = channel_name ORDER BY se.created_at DESC LIMIT 1) AS formatted_created_at,

                (SELECT DATE_FORMAT(s.created_at, '%b %e, %Y %l:%i %p') FROM send_emails s WHERE s.subject = channel_name ORDER BY s.created_at DESC LIMIT 1) AS full_created_at,
                (SELECT DATE_FORMAT(s.created_at, '%a, %b %e %l:%i %p') FROM send_emails s WHERE s.subject = channel_name ORDER BY s.created_at DESC LIMIT 1) AS no_year_created_at,
                (SELECT UPPER(LEFT(s.name, 1)) FROM send_emails s WHERE s.subject = channel_name ORDER BY s.created_at DESC LIMIT 1) AS sender_name_letter

            FROM channels ORDER BY sub_created_at DESC;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS inbox_view");
    }
};
