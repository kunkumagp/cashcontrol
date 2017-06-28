<?php

namespace App\Http\Controllers;

use App\Income;
use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WalletController extends Controller
{
    public function getWallet($id) {
        $incomes = Income::select('updated_at', 'title', 'amount', 'category_id', 'store_id', 'id')
                ->with('category')
                ->with('store')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->where('store_id', 2)
                ->get()
                ->toArray();


        $expenses = Expense::select('updated_at', 'title', 'amount', 'category_id', 'store_id', 'id')
                ->with('category')
                ->with('store')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->where('store_id', 2)
                ->get()
                ->toArray();
        
        $all = array_merge($incomes, $expenses);

        return $all;
    }
    
    public function totalWallet($id) {
        $incomes = DB::table('incomes')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->where('store_id', 2)
                ->sum('amount');
        
        $expenses = DB::table('expenses')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->where('store_id', 2)
                ->sum('amount');
        
        $all = $incomes-$expenses;
        $money = number_format($all, 2, ".", ",");
        return $money;
    }
}
