<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_participants')) {
            return;
        }
        Schema::create('grr_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entry_id')->constrained('grr_entry');
            $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();
            $table->string('created_by', 200)->default('');
            $table->string('beneficiaire', 190)->default('');
            $table->string('beneficiaire_ext', 200)->default('');
            $table->tinyInteger('moderation')->default(0);
        });
    }
};
