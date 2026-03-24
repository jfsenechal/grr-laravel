<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_calendar')) {
            return;
        }
        Schema::create('grr_calendar', function (Blueprint $table) {
            $table->integer('day');
        });
    }
};
