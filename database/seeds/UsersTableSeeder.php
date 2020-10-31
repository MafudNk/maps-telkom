<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Adminstrator';
        $user->username = 'admin';
        $user->status = 'admin';
        $user->password = bcrypt('admin');
        $user->save();
    }
}
