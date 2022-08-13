<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingTable extends Migration
{
    public function up()
    {
        Schema::create('site_setting', function (Blueprint $table) {

		$table->bigInteger('id',20)->unsigned();
		$table->string('logob',250)->nullable()->default('NULL');
		$table->string('logof')->nullable()->default('NULL');
		$table->string('logow',250)->nullable()->default('NULL');
		$table->text('site_logo');
		$table->text('fav_icon');
		$table->string('site_title');
		$table->timestamp('created_at')->nullable()->default('NULL');
		$table->timestamp('updated_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('site_setting');
    }
}