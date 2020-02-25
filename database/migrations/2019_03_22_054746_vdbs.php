<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vdbs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolyears', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('sy_start'); 
            $table->string('sy_end'); 
            $table->integer('status'); 
            $table->timestamps();
        });
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('type'); 
            $table->string('sched_start'); 
            $table->string('sched_end'); 
            $table->integer('status'); 
            $table->timestamps();
        });
        Schema::create('gradelevels', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('level'); 
            $table->integer('schedule_id');  
            $table->integer('status'); 
            $table->timestamps();
        });
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gradelevel_id');   
            $table->string('name'); 
            $table->integer('status'); 
            $table->timestamps();
        });
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();   
            $table->integer('section_id');  
            $table->string('lrn');
            $table->string('email')->nullable();
            $table->string('schoolyear')->nullable();  
            $table->string('fname')->nullable(); 
            $table->string('mname')->nullable(); 
            $table->string('lname')->nullable(); 
            $table->integer('age')->nullable(); 
            $table->string('gender')->nullable(); 
            $table->longText('address')->nullable();
            $table->string('parent')->nullable();
            $table->string('active')->nullable();   
            $table->longText('default')->nullable();
            $table->integer('status'); 
            $table->timestamps();
        });
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');   
            $table->string('eligibility'); 
            $table->integer('status'); 
            $table->timestamps();
        });
        Schema::create('elections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('schoolyear');
            $table->string('voting_start');   
            $table->string('voting_end');    
            $table->string('election_status')->nullable(); 
            $table->integer('status'); 
            $table->timestamps();
        });
        Schema::create('partylists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('election_id');   
            $table->string('name');    
            $table->longText('vision')->nullable(); 
            $table->integer('status'); 
            $table->timestamps();
        });
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id'); 
            $table->integer('partylist_id'); 
            $table->integer('position_id'); 
            $table->longText('photo')->nullable(); 
            $table->longText('intro')->nullable();   
            $table->integer('gpa')->nullable();    
            $table->longText('file_coc')->nullable(); 
            $table->longText('file_grade')->nullable(); 
            $table->longText('file_goodmoral')->nullable(); 
            $table->longText('file_consent')->nullable(); 
            $table->integer('status'); 
            $table->timestamps();
        });
        Schema::create('balots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('election_id');   
            $table->integer('user_id');     
            $table->integer('candidate_id');     
            $table->string('position');        
            $table->string('gradelevel');        
            $table->string('section');        
            $table->string('schedule');     
            $table->integer('status'); 
            $table->timestamps();
        }); 
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username'); 
            $table->string('password');
            $table->string('default')->nullable();
            $table->string('email')->nullable();
            $table->longText('img')->nullable();
            $table->integer('token')->nullable(); 
            $table->string('type'); ;
            $table->integer('status');
            $table->timestamps();
        }); 
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('message');  
            $table->integer('notify');  
            $table->integer('status');
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
        Schema::dropIfExists('schoolyears');
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('gradelevels');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('students');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('elections');
        Schema::dropIfExists('partylists');
        Schema::dropIfExists('candidates');
        Schema::dropIfExists('balots');
        Schema::dropIfExists('users');
        Schema::dropIfExists('notifications');
    }
}
