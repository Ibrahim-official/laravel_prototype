<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void  //applying the operation, change, add, remove
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            // foreign_id called employer_id
            //$table->unsignedBigInteger('employer_id');   // Whenever ypou call this id method within a mirgration, it creates big integer that automatically increases in the column
            $table->foreignIdFor(\App\Models\Employer::class);
            $table->string('title');
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void    //undo the thing
    {
        Schema::dropIfExists('job_listings');
    }
};
