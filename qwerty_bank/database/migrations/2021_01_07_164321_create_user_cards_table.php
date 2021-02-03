<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userCards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->string('cardNumber',20);
            $table->string('name',30);
            $table->string('surname',30);
            $table->integer('cardType');
            $table->boolean('isLocked');
            $table->timestamp('created_at')->useCurrent();
            $table->double('balance',10,2);
            $table->string('endDate',5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userCards');
    }
}
