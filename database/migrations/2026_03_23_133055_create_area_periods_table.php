<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_area_periodes')) {
            return;
        }
        Schema::create('grr_area_periodes', function (Blueprint $table) {
            $table->foreignId('area_id')->constrained('grr_area');
            $table->smallInteger('period_number')->default(0);
            $table->string('period_name', 100)->default('');

            $table->primary(['area_id', 'period_number']);
        });
    }
};
