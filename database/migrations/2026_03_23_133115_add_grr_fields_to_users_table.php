<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('statut', 30)->default('');
            $table->string('etat', 20)->default('');
            $table->smallInteger('default_site')->default(0);
            $table->smallInteger('default_area')->default(0);
            $table->smallInteger('default_room')->default(0);
            $table->string('default_style', 50)->default('');
            $table->string('default_list_type', 50)->default('');
            $table->char('default_language', 8)->default('');
            $table->string('source', 10)->default('local');
            $table->mediumText('commentaire')->nullable();
            $table->tinyInteger('desactive_mail')->default(0);
            $table->tinyInteger('nb_tentative')->default(0);
            $table->integer('date_blocage')->default(0);
            $table->tinyInteger('popup')->default(0);
        });
    }
};
