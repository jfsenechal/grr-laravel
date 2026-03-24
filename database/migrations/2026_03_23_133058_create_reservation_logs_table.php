<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_log_resa')) {
            return;
        }
        Schema::create('grr_log_resa', function (Blueprint $table) {
            $table->id();
            $table->integer('logged_at');
            $table->integer('entry_id');
            $table->string('identifier', 100);
            $table->unsignedTinyInteger('action');
            $table->text('details');
        });
    }
};
