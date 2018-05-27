<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('type_of_organization');
            $table->string('organization_name');
            $table->string('type_of_tips');
            $table->string('organization_address');
            $table->string('organization_date');
            $table->text('description');
            $table->string('conduct');
            $table->string('amount');
            $table->string('document');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('othernames')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('company');
            $table->string('address');
            $table->string('code')->nullable();
            $table->boolean('successful')->default(0);
            $table->boolean('attended')->default(0);
            $table->tinyInteger('approve')->default(0)->comment("0-no, 1-yes, 2-pending");
            $table->string('reply')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tips');
    }
}
