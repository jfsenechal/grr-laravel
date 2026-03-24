<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_repeat')) {
            return;
        }
        Schema::create('grr_repeat', function (Blueprint $table) {
            $table->id();
            $table->integer('start_time')->default(0);
            $table->integer('end_time')->default(0);
            $table->integer('rep_type')->default(0);
            $table->integer('end_date')->default(0);
            $table->string('rep_opt', 32)->default('');
            $table->foreignId('room_id')->constrained('grr_room');
            $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            $table->string('create_by', 190)->default('');
            $table->string('beneficiaire_ext', 200)->default('');
            $table->string('beneficiaire', 190)->default('');
            $table->string('name', 80)->default('');
            $table->char('type', 2)->default('A');
            $table->text('description')->nullable();
            $table->tinyInteger('rep_num_weeks')->default(0);
            $table->text('overload_desc')->nullable();
            $table->tinyInteger('days')->default(0);
            $table->tinyInteger('mail')->default(0);
            $table->integer('max_participant_count')->default(0);
        });
    }
};
