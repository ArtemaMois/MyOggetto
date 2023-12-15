<?php

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('body')
            ->nullable();
            $table->foreignIdFor(User::class)
            ->constrained()
            ->cascadeOnUpdate()
            ->nullable();
            $table->foreignIdFor(Meeting::class)
            ->constrained()
            ->cascadeOnDelete()
            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
