<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('booking_guest', function(Blueprint $table){
            
        //     $table -> foreign('guest_id', 'bo_gue')
        //            -> references('id')
        //            ->on('guests');

        //     $table -> foreign('booking_id', 'gue_bo')
        //            -> references('id')
        //            ->on('bookings');

        // });

        Schema::table('bookings', function(Blueprint $table){
            $table -> foreign('desk_id', 'bo_des')
                   -> references('id')
                   ->on('desks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('booking_guest', function(Blueprint $table){
        //     $table -> dropForeign('bo_gue');
        //     $table -> dropForeign('gue_bo');       

        // });

        Schema::table('bookings', function(Blueprint $table){
            $table -> dropForeign('bo_des');
        });

        
    }
}
