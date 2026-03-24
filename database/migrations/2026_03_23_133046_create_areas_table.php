<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_area')) {
            return;
        }
        Schema::create('grr_area', function (Blueprint $table) {
            $table->id();
            $table->string('area_name', 30)->default('');
            $table->char('access', 1)->default('');
            $table->smallInteger('order_display')->default(0);
            $table->string('ip_adr', 15)->default('');
            $table->smallInteger('morning_starts_area')->default(0);
            $table->smallInteger('evening_ends_area')->default(0);
            $table->integer('max_booking_duration_area')->default(-1);
            $table->integer('resolution_area')->default(0);
            $table->smallInteger('evening_ends_minutes_area')->default(0);
            $table->smallInteger('week_starts_area')->default(0);
            $table->smallInteger('twentyfourhour_format_area')->default(0);
            $table->char('calendar_default_values', 1)->default('y');
            $table->char('enable_periods', 1)->default('n');
            $table->string('display_days', 7)->default('yyyyyyy');
            $table->integer('default_type_id')->default(-1);
            $table->integer('default_booking_duration_area')->default(0);
            $table->smallInteger('max_booking')->default(-1);
            $table->integer('user_right')->nullable();
            $table->tinyInteger('access_file')->nullable();
            $table->integer('upload_file')->nullable();
        });
    }
};
