<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained();
            $table->string('room_name', 60)->default('');
            $table->string('description', 60)->default('');
            $table->integer('capacity')->default(0);
            $table->smallInteger('max_booking')->default(-1);
            $table->char('status_room', 1)->default('1');
            $table->char('show_fic_room', 1)->default('n');
            $table->string('picture_room', 50)->default('');
            $table->text('comment_room');
            $table->char('show_comment', 1)->default('n');
            $table->smallInteger('max_booking_delay')->default(-1);
            $table->mediumInteger('min_booking_delay')->default(0);
            $table->char('allow_action_in_past', 1)->default('n');
            $table->char('dont_allow_modify', 1)->default('n');
            $table->smallInteger('order_display')->default(0);
            $table->smallInteger('option_booking_delay')->default(0);
            $table->smallInteger('booking_display_type')->default(0);
            $table->tinyInteger('moderate')->default(0);
            $table->char('who_can_book_for', 1)->default('5');
            $table->char('active_resource_borrowing', 1)->default('y');
            $table->char('active_key', 1)->default('y');
            $table->tinyInteger('active_participant')->default(0);
            $table->tinyInteger('participant_registration')->default(1);
            $table->smallInteger('default_participant_count')->default(0);
            $table->smallInteger('who_can_see')->default(0);
            $table->smallInteger('booking_range')->default(-1);
            $table->tinyInteger('who_can_book')->default(1);
            $table->tinyInteger('confidential_booking')->default(0);
        });
    }
};
