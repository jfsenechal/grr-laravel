<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('status_correspondences', function (Blueprint $table) {
            $table->id();
            $table->string('function_code', 30);
            $table->string('function_label', 200);
            $table->string('grr_status', 30);
        });
    }
};
