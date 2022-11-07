<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropColumn('deleted_at');
            $table->string('deleted_by')->nullable()->change();
            $table->date('created_at')->useCurrent()->change();
            $table->string('created_by')->nullable()->change();
            $table->date('updated_at')->useCurrentOnUpdate()->change();
            $table->string('updated_by')->nullable()->change();
            $table -> softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
