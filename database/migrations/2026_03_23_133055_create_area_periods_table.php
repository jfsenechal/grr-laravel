<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('area_periods', function (Blueprint $table) {
            $table->foreignId('area_id')->constrained();
            $table->smallInteger('period_number')->default(0);
            $table->string('period_name', 100)->default('');

            $table->primary(['area_id', 'period_number']);
        });
    }
};
