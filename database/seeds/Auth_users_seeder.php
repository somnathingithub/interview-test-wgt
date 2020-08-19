<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Auth_users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();

        $users = [
        [
            'name'    => 'Somnath Admin',
            'email'    => 'somnath.admin@gmail.com',
            'password'   =>  Hash::make('admin'),
            'remember_token' =>  str_random(7),
        ],
        [
            'name'    => 'Amit Employee',
            'email'    => 'amit.employee@gmail.com',
            'password'   =>  Hash::make('employee'),
            'remember_token' =>  str_random(7),
        ],
        [
            'name'    => 'Sunil General Staf',
            'email'    => 'sunil.general.staff@gmail.com',
            'password'   =>  Hash::make('general_staff'),
            'remember_token' =>  str_random(7),
        ]];

        foreach($users as $user){
            User::create($user);
        }
    }
}
