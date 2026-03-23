<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('area_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('area_id')->constrained();
            $table->unsignedBigInteger('group_id')->default(0);

            $table->primary(['user_id', 'area_id', 'group_id']);
        });
    }
};
