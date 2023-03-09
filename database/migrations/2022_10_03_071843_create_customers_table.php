<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('business_id')->unique(); // Business ID - IČO
            $table->string('tax_id'); // Tax ID - DIČ
            $table->string('vat_id')->nullable(); // VAT registration number - IČ DPH
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
