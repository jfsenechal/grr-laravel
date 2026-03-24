<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_j_mailuser_room')) {
            return;
        }
        Schema::create('grr_j_mailuser_room', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('room_id')->constrained('grr_room');
            $table->boolean('mail_resa')->default(true);
            $table->boolean('mail_hebdo')->default(false);

            $table->primary(['user_id', 'room_id']);
        });
    }
};
