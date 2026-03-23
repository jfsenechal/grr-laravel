<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->integer('start_time')->default(0);
            $table->integer('end_time')->default(0);
            $table->integer('entry_type')->default(0);
            $table->integer('repeat_id')->default(0);
            $table->foreignId('room_id')->constrained();
            $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            $table->string('create_by', 190)->default('');
            $table->string('beneficiaire_ext', 200)->default('');
            $table->string('beneficiaire', 190)->default('');
            $table->string('name', 80)->default('');
            $table->char('type', 2)->default('A');
            $table->text('description')->nullable();
            $table->char('status_entry', 1)->default('-');
            $table->integer('option_reservation')->default(0);
            $table->text('overload_desc')->nullable();
            $table->tinyInteger('moderate')->default(0);
            $table->tinyInteger('days')->default(0);
            $table->tinyInteger('key')->default(0);
            $table->tinyInteger('mail')->default(0);
            $table->integer('max_participant_count')->default(0);
            $table->tinyInteger('deleted')->default(0);

            $table->index('start_time');
            $table->index('end_time');
            $table->index('room_id');
        });
    }
};
