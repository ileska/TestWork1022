<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert some stuff
        DB::table('users')->insert(
            array(
                'id' => 55,
                'email' => 'user@domain.example',
                'name' => 'Test User',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            )
        );

        DB::table('roles')->insert(
            array(
                'id' => 55,
                'name' => 'author',
                'slug' => 'author'
            )
        );

        DB::table('users_roles')->insert(
            array(
                'user_id' => 55,
                'role_id' => 55,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
