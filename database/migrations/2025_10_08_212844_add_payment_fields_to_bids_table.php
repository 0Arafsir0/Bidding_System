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
       Schema::table('bids', function (Blueprint $table) {
        $table->string('bkash_number')->nullable();
        $table->string('transaction_id')->nullable();
        $table->enum('payment_status', ['pending', 'paid'])->default('pending');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bids', function (Blueprint $table) {
        $table->dropColumn(['bkash_number', 'transaction_id', 'payment_status']);
    });
    }
};
