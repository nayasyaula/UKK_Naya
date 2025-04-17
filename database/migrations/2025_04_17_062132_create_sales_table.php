<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('member_id')->nullable()->constrained('members')->onDelete('set null');
            $table->string('status_member')->default('non_member');
            $table->integer('poin_used')->default(0);
            $table->integer('poin_reward')->default(0);
            $table->integer('total_price');
            $table->integer('total_pay');
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
