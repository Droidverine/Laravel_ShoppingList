<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppinglistitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppinglistitems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String('Item_name');
            $table->String('Item_category');
            $table->String('Item_createdby');
            $table->String('Item_status');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoppinglistitems');
    }
}
