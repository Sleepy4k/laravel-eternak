<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company');
            $table->string('livestock_id');
            $table->enum('age', ['0-2', '2-4', '4-6', '6-8', '8-10', '10-12', '12-18'])->default('0-2');
            $table->bigInteger('height')->default(0);
            $table->bigInteger('weight')->default(0);
            $table->enum('status', ['hidup', 'mati', 'terjual', 'hilang'])->default('hidup');
            $table->text('note')->nullable();
            $table->timestamp('date');
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
        Schema::dropIfExists('medical_records');
    }
}
