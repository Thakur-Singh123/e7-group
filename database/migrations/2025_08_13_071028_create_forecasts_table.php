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
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();
            $table->string('segment');
            $table->string('category');
            $table->string('revised_category');
            $table->string('country');
            $table->string('gp_id');
            $table->string('customer_name');
            
            // Monthly Data (Actuals)
            $table->string('jan_25_a');
            $table->string('feb_25_a');
            $table->string('mar_25_a');
            $table->string('apr_25_a');
            $table->string('may_25_a');
            $table->string('jun_25_a');
            
            // Forecast (F2)
            $table->string('jul_25_f2');
            $table->string('aug_25_f2');
            $table->string('sep_25_f2');
            $table->string('oct_25_f2');
            $table->string('nov_25_f2');
            $table->string('dec_25_f2');
            
            // Summaries
            $table->string('fy_2025_h1');
            $table->string('h1');
            $table->string('h2_july');
            $table->string('per_month');
            $table->string('re_forecast_25_h2');
            $table->string('fy2025');
            
            // Status
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forecasts');
    }
};
