<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_j_group_site')) {
            return;
        }
        Schema::create('grr_j_group_site', function (Blueprint $table) {
            $table->foreignId('group_id')->constrained('grr_groupes');
            $table->foreignId('site_id')->constrained('grr_site');

            $table->primary(['group_id', 'site_id']);
        });
    }
};
