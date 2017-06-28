<?php

use Illuminate\Database\Seeder;

class ExpensesTableSeeder extends Seeder
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
            'category_id' => '5',
            'user_id' => '1',
            'store_id' => '2',
            'bank_id' => NULL,
            'title' => "Travel",
            'description' => '',
            'amount' => '1200',
            'status' => 'active',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);
    }
}
