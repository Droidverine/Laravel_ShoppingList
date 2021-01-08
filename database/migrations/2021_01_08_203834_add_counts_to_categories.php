<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountsToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shoppinglist_categories', function (Blueprint $table) {
            //
          $table->integer('items_count')->nullable();
           $table->integer('status_true_count')->nullable();
           $table->integer('status_false_count')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shoppinglist_categories', function (Blueprint $table) {
            //
        });
    }
}
