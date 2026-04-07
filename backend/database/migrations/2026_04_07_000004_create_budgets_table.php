<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('wallet_id')->nullable()->constrained('wallets')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->unsignedTinyInteger('month');
            $table->unsignedSmallInteger('year');
            $table->decimal('amount_limit', 14, 2);
            $table->unsignedTinyInteger('alert_threshold')->default(80);
            $table->boolean('rollover')->default(false);
            $table->string('note')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'month', 'year']);
            $table->index(['wallet_id', 'month', 'year']);
            $table->index('category_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
