<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(
            [
                'name'     => 'Admin',
                'username' => 'Superadmin',
                'no_hp'    => '08123456789',
                'password' => bcrypt('12345'),
                'rt'       => '03',
                'rw'       => '08',
                'address'  => 'lorem ipsum',
                'role'     => 'superadmin',
            ]
        );
    }
}
