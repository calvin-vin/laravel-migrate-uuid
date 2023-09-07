<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyIdToUuid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop Foreign Key Constraint
        Schema::table('todos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        // Change type of column id into string
        Schema::table('users', function (Blueprint $table) {
            $table->string('id')->change();
        });

        // Change type of column id into string
        Schema::table('todos', function (Blueprint $table) {
            $table->string('user_id')->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        
        // Iterate each row and change the id into uuid
        DB::table('users')->cursor()->each(function ($user) {
            $uuid = (string) Str::uuid();
            DB::table('users')
                ->where('id', $user->id)
                ->update(['id' => $uuid]);

            DB::table(('todos'))
                ->where('user_id', $user->id)
                ->update(['user_id' => $uuid]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uuid', function (Blueprint $table) {
            //
        });
    }
}
