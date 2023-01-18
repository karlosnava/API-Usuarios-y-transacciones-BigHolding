<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("amount");
            $table->text("transaction_detail");
            $table->string("month"); 
            $table->string("year");
            $table->unsignedBigInteger("user_id");
            $table->integer("transaction_status_id");
            $table->integer("transaction_type_id");
            $table->integer("segmentation_id");
            $table->timestamps();

            $table->foreign("user_id")
                ->references("id")->on("users")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
