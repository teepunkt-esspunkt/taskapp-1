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
        Schema::table('tasks', function (Blueprint $table) {
            /*
            $table->foreignId('user_id')
            ->nullable() // Da wir bereits task ohne User id haben würde es zu einem fehler kommen ohne nullable
            ->constrained()
            ->cascadeOnDelete(); //wird der user, der den task erstellt hat, gelöscht, wird auch der task gelöscht
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
