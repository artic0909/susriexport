<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSizeColumnsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop foreign key constraints if they exist
            if (Schema::hasColumn('products', 'minimum_size_id')) {
                $table->dropForeign(['minimum_size_id']);
            }

            if (Schema::hasColumn('products', 'maximum_size_id')) {
                $table->dropForeign(['maximum_size_id']);
            }

            // Add minimum_size_id column
            $table->unsignedBigInteger('minimum_size_id')->nullable();
            $table->foreign('minimum_size_id')->references('id')->on('sizes')->onDelete('set null');

            // Add maximum_size_id column
            $table->unsignedBigInteger('maximum_size_id')->nullable();
            $table->foreign('maximum_size_id')->references('id')->on('sizes')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop foreign key constraints if they exist
            $table->dropForeign(['minimum_size_id']);
            $table->dropForeign(['maximum_size_id']);

            // Drop columns
            $table->dropColumn(['minimum_size_id', 'maximum_size_id']);
        });
    }
}
