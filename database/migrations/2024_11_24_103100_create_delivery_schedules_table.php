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
        Schema::create('delivery_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('driver_assignment_id');
            $table->unsignedBigInteger('vehicle_assignment_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('delivery_type', ['collection', 'delivery']);
            $table->string('delivery_notes')->nullable();
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('collected_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('driver_assignment_id')->references('id')->on('driver_assignments');
            $table->foreign('vehicle_assignment_id')->references('id')->on('vehicle_assignments');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('delivery_schedule');
        Schema::enableForeignKeyConstraints();
    }
};
