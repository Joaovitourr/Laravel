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
        Schema::create('usersTickets', function(Blueprint $table){
            $table->id();
            $table->string('user_id', 10);
            $table->string('title', 200);
            $table->string('description', 400);
            $table->string('priority'); 
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('closed_at')->nullable();
            
        
    } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
