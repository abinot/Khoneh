<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->index('role');
            $table->index('is_active');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->index('status');
        });

        Schema::table('preorders', function (Blueprint $table) {
            $table->index('plan');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
            $table->dropIndex(['is_active']);
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIndex(['status']);
        });

        Schema::table('preorders', function (Blueprint $table) {
            $table->dropIndex(['plan']);
        });
    }
};
