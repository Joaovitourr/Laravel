<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create(['ticket_responses'], function(Blueprint $table){
            
         $table->id();
         $table->string('user_id');
         $table->timestamp('received');
         $table->timestamp('term');
         $table->string('protocol');
         $table->string('status_ticket');
         $table->timestamp('created_at');
         $table->timestamp('updated_at');
         $table->timestamp('closed_at');
        

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
