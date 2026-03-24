<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_site')) {
            return;
        }
        Schema::create('grr_site', function (Blueprint $table) {
            $table->id();
            $table->string('site_code', 10)->unique()->nullable();
            $table->string('site_name', 50)->unique()->default('');
            $table->char('access', 1)->default('a');
            $table->string('address_line1', 38)->nullable();
            $table->string('address_line2', 38)->nullable();
            $table->string('address_line3', 38)->nullable();
            $table->string('postal_code', 5)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('fax', 25)->nullable();
        });
    }
};
