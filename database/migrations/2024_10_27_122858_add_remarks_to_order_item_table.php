<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemarksToOrderItemTable extends Migration
{
    public function up()
    {
        Schema::table('order_item', function (Blueprint $table) {
            $table->string('remarks')->nullable()->after('cost')
                  ->comment('Additional remarks or comments for the order item');
        });
    }

    public function down()
    {
        Schema::table('order_item', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });
    }
}
