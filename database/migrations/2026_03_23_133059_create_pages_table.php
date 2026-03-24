<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_page')) {
            return;
        }
        Schema::create('grr_page', function (Blueprint $table) {
            $table->string('slug', 30)->primary();
            $table->string('title', 255)->default('');
            $table->longText('content');
            $table->boolean('is_system')->default(false);
            $table->string('minimum_status', 30);
            $table->string('link', 255);
            $table->boolean('open_in_new_tab')->default(true);
            $table->smallInteger('sort_order')->default(0);
            $table->smallInteger('position')->default(1);
        });
    }
};
