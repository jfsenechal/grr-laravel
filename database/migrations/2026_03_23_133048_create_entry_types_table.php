<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_type_area')) {
            return;
        }
        Schema::create('grr_type_area', function (Blueprint $table) {
            $table->id();
            $table->string('type_name', 30)->default('');
            $table->smallInteger('order_display')->default(0);
            $table->smallInteger('color')->default(0);
            $table->string('color_hex', 10)->default('');
            $table->string('text_color', 10)->default('#000000');
            $table->string('icon_color', 10)->default('#000000');
            $table->char('type_letter', 2)->default('');
            $table->char('available', 1)->default('2');
        });
    }
};
