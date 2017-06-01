<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    public function up()
    {
        Schema::table('auth_sessions', function(Blueprint $t){
            $t
                -> foreign('user_id')
                -> references('id')
                -> on('users')
                -> onUpdate('cascade')
                -> onDelete('cascade');
        });

        Schema::table('incomes', function (Blueprint $t){
            $t
                -> foreign('categoryId')
                -> references('id')
                -> on('categories')
                -> onUpdate('cascade')
                -> onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('auth_sessions', function(Blueprint $t){
            $t -> dropForeign('auth_sessions_user_id_foreign');
        });
        Schema::table('incomes', function (Blueprint $t){
            $t -> dropForeign('incomes_categoryId_foreign');
        });
    }
}
