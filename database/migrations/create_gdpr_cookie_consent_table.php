<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cookie_consents', static function (Blueprint $table) {
            $table->id();
            $table->uuid('consent_token')->unique();
            $table->json('consent_preferences');
            $table->string('policy_version')->default('1.0');
            $table->timestamp('consented_at');
            $table->timestamps();
        });

    }
};
