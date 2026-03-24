<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_j_type_area')) {
            return;
        }
        Schema::create('grr_j_type_area', function (Blueprint $table) {
            $table->foreignId('entry_type_id')->constrained('grr_type_area');
            $table->foreignId('area_id')->constrained('grr_area');

            $table->primary(['entry_type_id', 'area_id']);
        });
    }
};
