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
    public function up(): void
    {
        Schema::create('accounts', static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->date('dob')->nullable();
            $table->date('pob')->nullable();
            $table->string('address')->nullable();
            $table->string('photo')->nullable();
            $table->string('photo_link')->nullable();
            $table->text('photo_path')->nullable();
            $table->foreignUuid('user_id')->nullable()
                ->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('status')->default(true);
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('account');
        Schema::enableForeignKeyConstraints();
    }
};
