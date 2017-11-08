<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoumndsDished extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dish', function($table) {
            $table->text('preparation_time');
            $table->text('description');
            $table->text('nutrition_facts');
            $table->text('ingredients');  
            $table->text('category'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dish', function($table) {
            $table->column('rate');
            $table->column('description');
            $table->column('nutrition_facts');
            $table->column('ingredients');
            $table->column('category');
        });
    }
}
