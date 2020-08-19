<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
            'name' =>'Dotto Joel',
            'type'=>'semLeader',
            'gender'=>'male',
            'email' => 'admin@bsm.com',
            'password' => Hash::make('password'),
        ]);

        $role = Role::find(1);
        $user->roles()->attach($role);
    }
}
