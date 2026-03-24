<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_entry_moderate')) {
            return;
        }
        Schema::create('grr_entry_moderate', function (Blueprint $table) {
            $table->id();
            $table->string('moderator_login', 40)->default('');
            $table->text('moderation_motivation');
            $table->integer('start_time')->default(0);
            $table->integer('end_time')->default(0);
            $table->integer('entry_type')->default(0);
            $table->integer('repeat_id')->default(0);
            $table->foreignId('room_id')->constrained('grr_room');
            $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            $table->string('create_by', 190)->default('');
            $table->string('beneficiaire_ext', 200)->default('');
            $table->string('beneficiaire', 190)->default('');
            $table->string('name', 80)->default('');
            $table->char('type', 2)->nullable();
            $table->text('description')->nullable();
            $table->char('status_entry', 1)->default('-');
            $table->integer('option_reservation')->default(0);
            $table->text('overload_desc')->nullable();
            $table->tinyInteger('moderate')->default(0);

            $table->index('start_time');
            $table->index('end_time');
        });
    }
};
