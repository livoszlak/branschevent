<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('street_name')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();
            $table->text('about')->nullable();
            $table->boolean('has_LIA')->default(false);
            $table->string('contact_email')->nullable();
            $table->string('contact_LinkedIn')->nullable();
            $table->string('contact_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
