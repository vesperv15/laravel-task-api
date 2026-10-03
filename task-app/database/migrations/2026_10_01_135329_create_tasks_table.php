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
        Schema::create('tasks' , function (Blueprint $table) {
            $table->id();
            $table->string('title');  //görrev baslıgı
            $table->text('description')->nullable();   //acıklama
            $table->boolean('is_completed')->default(false);    // görev tamamlandı mı varsayılan hayır
            $table->timestamps(); // created at ve updated at tarihleri
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
