<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();

            $table->string('name');
            $table->string('username');
            $table->string('email');
            $table->string('gender')->default('');
            $table->string('profile_pic')->default('images.png');
            $table->string('bio')->default('');
            $table->integer('posts')->default(0);
            $table->integer('followers')->default(0);
            $table->integer('following')->default(0);



            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('profile');
    }
}
