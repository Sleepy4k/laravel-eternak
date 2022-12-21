<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_datas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company');
            $table->string('register_number');
            $table->string('livestock_name')->default('NULL');
            $table->enum('gender', ['jantan', 'betina'])->default('jantan');
            $table->string('racial')->default('NULL');
            $table->date('birthday');
            $table->bigInteger('weight')->default(0);
            $table->bigInteger('lenght')->default(0);
            $table->bigInteger('height')->default(0);
            $table->string('register_number_father')->nullable();
            $table->string('register_number_mother')->nullable();
            $table->enum('status', ['hidup', 'mati', 'terjual', 'hilang'])->default('hidup');
            $table->softDeletes();
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
        Schema::dropIfExists('farm_datas');
    }
}
