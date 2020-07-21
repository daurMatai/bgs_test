<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('date_of');
            $table->string('city');
            $table->timestamps();
        });

        DB::table('events')->insert(
           [
               'name' => 'jet brains',
               'date_of' => Carbon::parse(Carbon::now())->addDays(5),
               'city' => 'Прага'
           ]
        );

        DB::table('events')->insert(
            [
                'name' => 'laravel',
                'date_of' => Carbon::parse(Carbon::now())->addMonth(),
                'city' => 'Лондон'
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
