<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('reservation_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('logged_at');
            $table->integer('entry_id');
            $table->string('identifier', 100);
            $table->unsignedTinyInteger('action');
            $table->text('details');
        });
    }
};
