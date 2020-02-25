<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMorefieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phno', 20)->after('email')->nullable();
            $table->tinyInteger('role_id')->after('phno')->default(0)->comment('0 = Default, 1 = Admin, 2 = User');
            $table->tinyInteger('status')->after('role_id')->default(1)->comment('0 = Inactive, 1 = Active, 3 = Deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phno', 'role_id', 'status']);
        });
    }
}
