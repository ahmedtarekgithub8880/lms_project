<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditQuizAttemptAnswersMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quiz_attempt_answers', function (Blueprint $table) {


//            $table->unsignedBigInteger('quiz_question_id')->nullable();
//            $table->foreign('quiz_question_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quiz_attempt_answers', function (Blueprint $table) {
            //
        });
    }
}
