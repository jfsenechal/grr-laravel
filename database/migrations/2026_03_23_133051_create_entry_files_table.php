<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_files')) {
            return;
        }
        Schema::create('grr_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entry_id')->nullable()->constrained('grr_entry');
            $table->string('file_name', 50)->nullable();
            $table->string('public_name', 50)->nullable();
        });
    }
};
