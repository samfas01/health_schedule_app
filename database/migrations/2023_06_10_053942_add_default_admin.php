<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddDefaultAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@health-center.com',
            "department" => 'health center',
            "matric_no" => '000001',
            'password' => Hash::make('12345678'),
            'user_type'=>2,
            'compelete_profile' => 1,
            'photo' => 'admin',
            'email_verified_at' => Carbon::now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('email', '=', 'admin@health-center.com')->delete();
    }
}
