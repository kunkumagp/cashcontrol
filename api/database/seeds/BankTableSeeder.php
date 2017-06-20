<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'id' => '1',
            'user_id' => '1',
            'title' => 'HNB Bank',
            'type' => 'personal',
            'acc_no' => '1236547879',
            'acc_total' => '0',
            'status' => 'active',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        
        DB::table('banks')->insert([
            'id' => '2',
            'user_id' => '1',
            'title' => 'HNB Bank',
            'type' => 'personal',
            'acc_no' => '654321879',
            'acc_total' => '0',
            'status' => 'active',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        
        DB::table('banks')->insert([
            'id' => '3',
            'user_id' => '1',
            'title' => 'HNB Bank',
            'type' => 'fixed',
            'acc_no' => '321456987',
            'acc_total' => '0',
            'status' => 'active',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        
    }
}
