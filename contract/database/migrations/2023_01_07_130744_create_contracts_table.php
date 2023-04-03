<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('quran_date');
            $table->boolean('is_mosque')->default(0);
            $table->string('quran_address');
            $table->decimal('deferred_dowry');
            $table->decimal('prompt_dower');
            $table->text('terms');

            $table->enum('status', ['P', 'A', 'R','C'])
                ->default('P')
                ->comment('P => Pending, A => Accepted, R => Rejected , C => Closed');

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('action_by')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate();

            $table->integer('updated_by')->nullable();

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
        Schema::dropIfExists('contracts');
    }
}
