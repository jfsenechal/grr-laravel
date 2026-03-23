<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('group_site', function (Blueprint $table) {
            $table->foreignId('group_id')->constrained();
            $table->foreignId('site_id')->constrained();

            $table->primary(['group_id', 'site_id']);
        });
    }
};
