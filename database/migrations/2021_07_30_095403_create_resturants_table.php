<?php

use App\Models\Resturant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->string('type');
            $table->string('name_ar');
            $table->string('name_en');
            $table->unsignedInteger('branches_no');
            $table->string('manager_name');
            $table->string('manager_phone');
            $table->string('email');
            $table->string('commercial_registration_no');
            $table->string('tax_registration_no');
            $table->string('loyalty_points');
            $table->string('category');
            $table->json('accepted_payment_methods');
            $table->json('services');
            $table->string('activated')->default(Resturant::NO);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resturants');
    }
}
