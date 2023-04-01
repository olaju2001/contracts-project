<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('marital_status',['single','married','divorced','widower'])->nullable();
            $table->string('nationality');
            $table->string('profession');
            $table->text('address');
            $table->string('phone_number');
            $table->enum('type', ['husband', 'wife', 'first_witness', 'second_witness', 'agent']);
            $table->enum('kinship_degree',['father','brother','uncle','grand_father','other']) ->nullable();

            $table->foreignId('contract_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

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
        Schema::dropIfExists('contract_people');
    }
}
