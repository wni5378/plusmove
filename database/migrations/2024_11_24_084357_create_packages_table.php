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
        Schema::disableForeignKeyConstraints();
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('delivery_schedule_id')->nullable();
            $table->string('tracking_number', 18);
            $table->integer('weight');
            $table->integer('dimension_x');
            $table->integer('dimension_y');
            $table->integer('dimension_z');
            $table->enum('status', ['collected', 'at-warehouse', 'onboard-vehicle', 'returned-warehouse', 'delivered']);
            $table->timestamp('collected_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('delivery_schedule_id')->references('id')->on('delivery_schedule');
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
