<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_j_site_area')) {
            return;
        }
        Schema::create('grr_j_site_area', function (Blueprint $table) {
            $table->foreignId('site_id')->constrained('grr_site');
            $table->foreignId('area_id')->constrained('grr_area');
            $table->primary(['site_id', 'area_id']);
        });
    }
};
