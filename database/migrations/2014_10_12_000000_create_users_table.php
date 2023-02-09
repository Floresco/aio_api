<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('email');
            $table->boolean('has_email_verified')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 20)->nullable();
            $table->boolean('has_phone_verified')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('provider_type')->nullable();
            $table->string('provider_id')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_vip')->default(false);
            $table->boolean('is_customer')->default(true);
            $table->char('otp_mail', 4)->nullable();
            $table->char('otp_phone', 4)->nullable();
            $table->boolean('has_agreed')->default(false);
            $table->smallInteger('etat')->default(\App\Helpers\CodeStatus::ETAT_ACTIVE);
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
