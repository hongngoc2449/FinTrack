<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('wallet_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->decimal('amount', 14, 2);
            $table->enum('type', ['income', 'expense']);
            // Legacy category text is kept for compatibility with existing API payloads.
            $table->string('category')->nullable();
            $table->date('transaction_date');
            $table->text('note')->nullable();
            $table->enum('source', ['manual', 'recurring', 'import'])->default('manual');
            $table->enum('status', ['posted', 'pending', 'void'])->default('posted');
            $table->string('external_ref', 100)->nullable();
            $table->timestamps();

            $table->index(['user_id', 'transaction_date']);
            $table->index(['wallet_id', 'transaction_date']);
            $table->index(['type', 'transaction_date']);
            $table->index('category_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};