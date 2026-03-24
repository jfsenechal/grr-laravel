<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('grr_utilisateurs_demandes')) {
            return;
        }
        Schema::create('grr_utilisateurs_demandes', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 30);
            $table->string('first_name', 30);
            $table->string('email', 100);
            $table->string('phone', 20);
            $table->string('password', 184);
            $table->text('comment');
            $table->date('requested_at');
            $table->tinyInteger('status')->default(0);
            $table->string('manager', 40)->default('');
            $table->date('decided_at')->nullable();
            $table->timestamps();
        });
    }
};
