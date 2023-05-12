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
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_postal_code')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_country')->nullable();
            $table->string('business_id')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('vat_id')->nullable();
            $table->tinyInteger('vat')->nullable()->default(0);
            $table->string('iban')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company_name');
            $table->dropColumn('company_address');
            $table->dropColumn('company_postal_code');
            $table->dropColumn('company_city');
            $table->dropColumn('company_country');
            $table->dropColumn('business_id');
            $table->dropColumn('tax_id');
            $table->dropColumn('vat_id');
            $table->dropColumn('vat');
            $table->dropColumn('iban');
        });
    }
};
