<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function getIncome()
    {
//        $incomes = Income::select('id', 'title', 'amount', 'category_id')->with('category')->findOrFail(1);

        $incomes = Income::select('id', 'title', 'amount', 'category_id')->with('category')->get();

        return $incomes;
    }

    public function createIncome(Request $request)
    {
        $incomes = new Income([
            'category_id' => $request->input('categoryList'),
            'title' => $request->input('incomeTitle'),
            'amount' => $request->input('incomeAmount'),
            'description' => $request->input('incomeDescription'),
            'status' => "active"
        ]);
        $incomes->save();

        return "success";
    }

    public function totleIncome()
    {
//        $incomes = Income::select('amount')->get();
        $price = DB::table('incomes')->sum('amount');

        $money = number_format($price, 2,".", "," );

        return $money;

    }
}
