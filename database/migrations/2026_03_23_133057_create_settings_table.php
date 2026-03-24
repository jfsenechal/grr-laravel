<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_setting')) {
            return;
        }
        Schema::create('grr_setting', function (Blueprint $table) {
            $table->string('name', 32)->primary();
            $table->text('value');
        });
    }
};
