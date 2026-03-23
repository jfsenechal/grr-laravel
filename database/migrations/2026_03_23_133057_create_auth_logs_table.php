<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('auth_logs', function (Blueprint $table) {
            $table->string('login', 190);
            $table->dateTime('start');
            $table->string('session_id', 64);
            $table->string('remote_addr', 40)->default('');
            $table->string('user_agent', 200)->default('');
            $table->string('referer', 200)->default('');
            $table->boolean('autoclose')->default(false);
            $table->dateTime('end');
            $table->primary(['session_id', 'start']);
        });
    }
};
