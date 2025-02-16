`<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateStandardValuesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('standard_values', function (Blueprint $table) {
                $table->id();
                $table->string('type'); // gap, e-learning, SP&QA
                $table->string('range'); // Range nilai (misal: "0-9", "90-100", dll.)
                $table->integer('conversion'); // Nilai konversi
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
            Schema::dropIfExists('standard_values');
        }
    }
