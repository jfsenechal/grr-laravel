<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('mail_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('sent_at');
            $table->string('from', 255);
            $table->string('to', 255);
            $table->string('subject', 255);
            $table->text('message');
        });
    }
};
