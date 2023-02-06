<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTableAddCategoriesRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Creare la colonna della chiave esterna
            $table->unsignedBigInteger('category_id')->after('id')->nullable();
            // Crea la relazione tra le tabelle
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');
        });}
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Eliminare la relazione: usa o il nome combinato delle tabelle o la chiave esterna
            $table->dropForeign(['category_id']);
            // Eliminare la colonna
            $table->dropColumn('category_id');
        });
    }
}
