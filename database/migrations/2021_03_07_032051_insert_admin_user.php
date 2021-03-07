<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class InsertAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = new User;
        $admin->id = 0;
        $admin->name = "Admin";
        $admin->email = "admin@cafeteria.com";
        $admin->email_verified_at = new DateTime();
        $admin->password = Hash::make("123");
        $admin->telefono = 638999999;
        $admin->rol = "ADMIN";
        $admin->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $admin = User::findOrFail(0)->delete();
    }
}
