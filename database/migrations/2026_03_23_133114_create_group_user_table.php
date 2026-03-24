<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_utilisateurs_groupes')) {
            return;
        }
        Schema::create('grr_utilisateurs_groupes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('group_id')->constrained('grr_groupes');

            $table->unique(['user_id', 'group_id']);
        });
    }
};
