<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('donation_details', function (Blueprint $table) {
            $table->string('payment_proof_path')->nullable()->after('payment_method');
            $table->string('input_source')->default('admin')->after('payment_proof_path');
        });

        DB::table('donation_details')
            ->whereNull('input_source')
            ->update(['input_source' => 'admin']);
    }

    public function down(): void
    {
        Schema::table('donation_details', function (Blueprint $table) {
            $table->dropColumn([
                'payment_proof_path',
                'input_source',
            ]);
        });
    }
};
