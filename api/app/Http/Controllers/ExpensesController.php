<?php

namespace App\Http\Controllers;
use App\Expense;
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
        $incomes = Expense::select('id', 'title', 'amount', 'category_id', 'store_id')
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
        

        $expenses = new Expense([
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
    
    public function editExpenses($id) {
        $incomes = Expense::select('id', 'category_id', 'title', 'description', 'amount', 'store_id', 'bank_id')
                ->with('category')
                ->with('store')
                ->with('bank')
                ->where('id', $id)
                ->first();

        return $incomes;
    }

    public function postEditExpenses(Request $request, $id) {
        $incomes = Expense::find($id);

        if ($request->input('expenseDescription') === null) {
            $description = "";
        } else {
            $description = $request->input('expenseDescription');
        }
        $stl = $request->input('storeList');
        if ($stl === "1") {
            $accList = $request->input('accList');
        } else if ($stl !== 1) {
            $accList = "0";
        }


        $incomes->category_id = $request->input('categoryList');
        $incomes->store_id = $stl;
        $incomes->bank_id = $accList;
        $incomes->title = $request->input('expenseTitle');
        $incomes->amount = $request->input('expenseAmount');
        $incomes->description = $description;
        $incomes->save();
        return "success";
    }

    public function deleteExpenses($id) {

        $incomes = Expense::find($id);
        $ica = $incomes->amount;
        $incomes->status = "delete";
        $incomes->save();

        if ($incomes->store_id == 1) {
            $banks = Bank::find($incomes->bank_id);
            $ba = $banks->acc_total;
            $newAmount = $ba - $ica;
            $banks->acc_total = $newAmount;
            $banks->save();
        }

        return "success";
    }

}
