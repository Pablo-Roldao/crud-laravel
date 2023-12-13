<?php

use App\Enum\GendersEnum;
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

        $genders = (new \ReflectionClass(GendersEnum::class))->getConstants();

        Schema::create('employees', function (Blueprint $table) use ($genders) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('cpf', 14)->unique();
            $table->bigInteger('birth_date');
            $table->string('phone', 19);
            $table->string('email');
            $table->enum('gender', $genders);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
