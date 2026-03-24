<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_calendrier_jours_cycle')) {
            return;
        }
        Schema::create('grr_calendrier_jours_cycle', function (Blueprint $table) {
            $table->integer('day');
            $table->string('label', 20)->default('');
        });
    }
};
