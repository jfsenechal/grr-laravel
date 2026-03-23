<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('overload_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained();
            $table->string('field_name', 55)->default('');
            $table->string('field_type', 25)->default('');
            $table->text('field_list');
            $table->char('required', 1)->default('n');
            $table->char('display', 1)->default('n');
            $table->char('confidential', 1)->default('n');
            $table->char('overload_mail', 1)->default('n');
            $table->text('mail_spec');

            $table->unique(['area_id', 'field_name']);
        });
    }
};
