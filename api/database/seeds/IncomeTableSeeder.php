<?php

use Illuminate\Database\Seeder;

class IncomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incomes')->insert([
            'id' => '1',
            'category_id' => '1',
            'user_id' => '1',
            'store_id' => '1',
            'title' => 'April Month',
            'description' => '',
            'amount' => '30000',
            'status' => 'active',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        DB::table('incomes')->insert([
            'id' => '2',
            'category_id' => '2',
            'user_id' => '1',
            'store_id' => '1',
            'title' => 'Fashion Bug Customer Feedback',
            'description' => '',
            'amount' => '20000',
            'status' => 'active',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        DB::table('incomes')->insert([
            'id' => '3',
            'category_id' => '1',
            'user_id' => '1',
            'store_id' => '1',
            'title' => 'May Month',
            'description' => '',
            'amount' => '30000',
            'status' => 'active',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);

    }
}
