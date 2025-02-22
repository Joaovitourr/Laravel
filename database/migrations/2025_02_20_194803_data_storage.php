<?php

use Illuminate\Container\Attributes\DB;
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
        Schema::create('users', function(Blueprint $table){

            $table->id();
            $table->string('name', 200);
            $table->string('email', 200)->unique();
            $table->string('password');
            $table->string('active')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
    

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
