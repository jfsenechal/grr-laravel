<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_groupes')) {
            return;
        }
        Schema::create('grr_groupes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->text('description');
            $table->boolean('is_archived')->default(false);
            $table->timestamps();
        });
    }
};
