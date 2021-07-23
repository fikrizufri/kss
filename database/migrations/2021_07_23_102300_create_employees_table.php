<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nip', 15);
            $table->string('slug', 15);
            $table->string('name');
            $table->enum('gender', ['male', 'fimale'])->default('male');
            $table->date('birthdate');
            $table->text('address');
            $table->string('phone', 13);
            $table->string('bank');
            $table->string('account_bank', 14);
            $table->string('tax_id', 16);
            $table->date('joindate');
            $table->enum('marital_status', ['marriage', 'single', 'single-parent'])->default('single');
            $table->enum('contract_type', ['fulltime', 'parttime'])->default('parttime');
            $table->enum('contract_status', ['active', 'inactive'])->default('active');
            $table->date('contract_start_date');
            $table->date('contract_end_date');
            $table->enum('place_of_emplloyement', ['headoffice', 'branch'])->default('headoffice');
            $table->string('photo')->default('default-photo.png');
            $table->enum('employe_level', ['junior', 'senior', 'staf'])->default('junior');
            $table->string('position_id')->references('id')->on('positions');
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
        Schema::dropIfExists('employees');
    }
}
