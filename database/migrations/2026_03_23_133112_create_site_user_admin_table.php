<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('site_user_admin', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('site_id')->constrained();

            $table->primary(['user_id', 'site_id']);
        });
    }
};
