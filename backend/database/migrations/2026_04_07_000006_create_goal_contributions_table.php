<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('goal_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('saving_goal_id')->constrained('saving_goals')->cascadeOnDelete();
            $table->foreignId('transaction_id')->nullable()->constrained('transactions')->nullOnDelete();
            $table->decimal('amount', 14, 2);
            $table->date('contribution_date');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->index(['saving_goal_id', 'contribution_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('goal_contributions');
    }
};
