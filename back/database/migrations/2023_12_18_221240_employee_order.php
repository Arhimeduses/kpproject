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
        Schema::create("employee_order", function (Blueprint $table) {
            $table->id();
            $table->integer("employee_id");
            $table->integer("order_id");
            $table->foreign("employee_id")->references("id")->on("employee");
            $table->foreign("order_id")->references("id")->on("orders");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("employee_order");
    }
};
