<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('outboxes', static function (Blueprint $table) {
            $table->id();
            $table->morphs('out');
            $table->text('text')->nullable();
            $table->string('status')->default('active');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('phones', static function (Blueprint $table) {
            $table->id();
            $table->string('phone')->index('I_phone');
            $table->integer('active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('emails', static function (Blueprint $table) {
            $table->id();
            $table->string('email')->index('I_email');
            $table->integer('active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('sms', static function (Blueprint $table) {
            $table->id();
            $table->string('phone')->index('I_phone');
            $table->integer('active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sms');
        Schema::dropIfExists('emails');
        Schema::dropIfExists('phones');
        Schema::dropIfExists('outboxes');
    }
};
