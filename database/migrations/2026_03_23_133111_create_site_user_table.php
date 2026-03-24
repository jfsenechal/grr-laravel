<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_j_user_site')) {
            return;
        }
        Schema::create('grr_j_user_site', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('site_id')->constrained('grr_site');
            $table->unsignedBigInteger('group_id')->default(0);

            $table->primary(['user_id', 'site_id', 'group_id']);
        });
    }
};
