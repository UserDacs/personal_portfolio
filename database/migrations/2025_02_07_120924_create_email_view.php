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
            CREATE VIEW email_view AS
            SELECT 
                se.id AS send_email_id,
                se.name AS sender_name,
                se.subject AS email_subject,
                se.body AS email_body,
                se.is_read,
                se.recipient_email AS r_email,
                se.recipient_email,
                UPPER(LEFT(se.name, 1)) AS sender_name_letter,
                CASE 
                    WHEN TIMESTAMPDIFF(SECOND, se.created_at, NOW()) < 86400 THEN 'Today' -- Less than 1 day
                    WHEN TIMESTAMPDIFF(DAY, se.created_at, NOW()) = 1 THEN '1 day ago' -- Exactly 1 day
                    WHEN TIMESTAMPDIFF(DAY, se.created_at, NOW()) < 7 THEN CONCAT(TIMESTAMPDIFF(DAY, se.created_at, NOW()), ' days ago')
                    WHEN TIMESTAMPDIFF(WEEK, se.created_at, NOW()) = 1 THEN '1 week ago'
                    WHEN TIMESTAMPDIFF(WEEK, se.created_at, NOW()) < 4 THEN CONCAT(TIMESTAMPDIFF(WEEK, se.created_at, NOW()), ' weeks ago')
                    WHEN TIMESTAMPDIFF(MONTH, se.created_at, NOW()) = 1 THEN '1 month ago'
                    WHEN TIMESTAMPDIFF(MONTH, se.created_at, NOW()) < 12 THEN CONCAT(TIMESTAMPDIFF(MONTH, se.created_at, NOW()), ' months ago')
                    WHEN TIMESTAMPDIFF(YEAR, se.created_at, NOW()) = 1 THEN '1 year ago'
                    ELSE CONCAT(TIMESTAMPDIFF(YEAR, se.created_at, NOW()), ' years ago')
                END AS formatted_created_at,
                DATE_FORMAT(se.created_at, '%b %e, %Y %l:%i %p') AS full_created_at,
                DATE_FORMAT(se.created_at, '%a, %b %e %l:%i %p') AS no_year_created_at,
                tu.id AS temp_user_id,
                tu.name AS temp_user_name,
                c.id AS channel_id,
                c.name AS channel_name,
                p.id AS participant_id,
                m.id AS message_id,
                m.sender_id AS message_sender_id,
                -- Count of unread emails per recipient
                (SELECT COUNT(*) FROM send_emails a WHERE a.is_read = '0' AND a.recipient_email = r_email) AS unread_count
            FROM 
                send_emails se
            LEFT JOIN temp_users tu ON se.recipient_email = tu.email
            LEFT JOIN channels c ON se.subject = c.name
            LEFT JOIN participants p ON p.channel_id = c.id AND p.user_id = tu.id 
            LEFT JOIN messages m ON m.channel_id = c.id AND m.sender_id = tu.id AND m.send_email_id = se.id
            -- Select only the most recent send_email_id for each recipient_email
            WHERE se.id IN (
                SELECT MAX(se2.id)
                FROM send_emails se2
                GROUP BY se2.recipient_email
            )
            GROUP BY se.recipient_email
            ORDER BY se.created_at DESC;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS email_view");
    }
};
