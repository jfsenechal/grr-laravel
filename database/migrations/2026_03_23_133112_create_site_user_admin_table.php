<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_j_useradmin_site')) {
            return;
        }
        Schema::create('grr_j_useradmin_site', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('site_id')->constrained('grr_site');

            $table->primary(['user_id', 'site_id']);
        });
    }
};
