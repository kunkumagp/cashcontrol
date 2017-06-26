<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
            'id'=>'1',
            'created_at'=>'2017-05-23 08:21:19',
            'updated_at'=>'2017-05-23 08:21:19',
            'name'=>'Administrator',
            'username'=>'admin',
            'email'=>'admin@cashcontrol.com',
            'password'=>'$2y$10$5vdBa1892X9aKEIkO4Eo8eopbAxl6s7CfWn/rQ61AbqGKoOKTE7ka',
            'currency'=>'Rs.'
        ]);
        $user->save();
    }
}
