<?php namespace Webinsane\Yandexmbutton\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('webinsane_yandexmbutton_transactions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('trans_id');
            $table->string('owner_id');
            $table->integer('amount');
            $table->integer('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('webinsane_yandexmbutton_transactions');
    }
}
