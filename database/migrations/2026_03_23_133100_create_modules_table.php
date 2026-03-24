<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_modulesext')) {
            return;
        }
        Schema::create('grr_modulesext', function (Blueprint $table) {
            $table->string('name', 50)->primary();
            $table->boolean('is_active')->default(false);
            $table->integer('version');
        });
    }
};
