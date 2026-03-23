<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('area_entry_type', function (Blueprint $table) {
            $table->foreignId('entry_type_id')->constrained();
            $table->foreignId('area_id')->constrained();

            $table->primary(['entry_type_id', 'area_id']);
        });
    }
};
