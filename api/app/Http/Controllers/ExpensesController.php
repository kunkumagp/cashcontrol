<?php

namespace App\Http\Controllers;
use App\Expenses;
use App\Store;
use App\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller {

    public function totalExpenses($id) {
        $price = DB::table('expenses')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->sum('amount');
        $money = number_format($price, 2, ".", ",");
        
        return $money;
    }

    public function getBankExpenses($id) {
//        return $id;
    }

    public function getExpenses($id) {
        $incomes = Expenses::select('id', 'title', 'amount', 'category_id', 'store_id')
                ->with('category')
                ->with('store')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->get();

        return $incomes;
    }
    
    public function createExpenses(Request $request, $id) {


        if ($request->input('expensesDescription') === null) {
            $description = "";
        } else {
            $description = $request->input('expensesDescription');
        }
        $stl = $request->input('storeList');
        if ($stl === "1") {
            $accList = $request->input('accList');
        }else if ($stl !== 1) {
            $accList = NULL;
        }
        

        $expenses = new Expenses([
            'category_id' => $request->input('categoryList'),
            'user_id' => $id,
            'store_id' => $stl,
            'bank_id' => $accList,
            'title' => $request->input('expensesTitle'),
            'amount' => $request->input('expensesAmount'),
            'description' => $description,
            'status' => 'active'
        ]);
        $expenses->save();
        return "success";
    }

}
