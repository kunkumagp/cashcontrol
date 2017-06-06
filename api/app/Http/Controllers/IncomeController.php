<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function getIncome() {
        $incomes = Income::
        select('id', 'categoryId', 'title', 'amount')
            ->join('categories', 'incomes.categoryId', '=', 'categories.id')
            ->get();

        return $incomes;
    }

    public function createIncome(Request $request){
        $incomes = new Income([
            'categoryId' => $request->input('categoryList'),
            'title' => $request->input('incomeTitle'),
            'amount' => $request->input('incomeAmount'),
            'description' => $request->input('incomeDescription')
        ]);
        $incomes->save();

        return "success";
    }
}
