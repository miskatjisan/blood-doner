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
        Schema::create('requestdonates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('blood_group');
            $table->string('area');
            $table->string('request_name');
            $table->string('request_phone');
            $table->text('request_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requestdonates');
    }
};
