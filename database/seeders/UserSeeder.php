<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'satryawiguna', 'email' => 'satrya@freshcms.net', 'password' => Hash::make('12345'), 'status' => 'ACTIVE'],
        ]);
    }
}
