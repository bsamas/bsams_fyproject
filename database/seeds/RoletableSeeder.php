<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoletableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Role::create([
            'name' =>'Admin',
            'description'=>'register'

        ]);
            Role::create([
            'name' =>'staff',
            'description'=>'report'
            ]);
    }
}
