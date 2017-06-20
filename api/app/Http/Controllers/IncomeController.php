<?php

namespace App\Http\Controllers;

use App\Income;
use App\Store;
use App\Bank;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller {

    public function getIncome($id) {
        $incomes = Income::select('id', 'title', 'amount', 'category_id')
                ->with('category')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->get();

        return $incomes;
    }

    public function createIncome(Request $request, $id) {
        

        if ($request->input('incomeDescription') === null) {
            $description = "";
        } else {
            $description = $request->input('incomeDescription');
        }

        $incomes = new Income([
            'category_id' => $request->input('categoryList'),
            'user_id' => $id,
            'title' => $request->input('incomeTitle'),
            'amount' => $request->input('incomeAmount'),
            'description' => $description,
            'status' => 'active'
        ]);
        $incomes->save();
        return "success";
    }

    public function totalIncome($id) {
        $price = DB::table('incomes')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->sum('amount');
        $money = number_format($price, 2, ".", ",");
        return $money;
    }

    public function editIncome($id) {
        $incomes = Income::select('id', 'category_id', 'title', 'description', 'amount', 'store_id', 'bank_id')
                ->with('category')
                ->with('store')
                ->with('bank')
                ->where('id', $id)
                ->first();

        return $incomes;
    }

    public function postEditIncome(Request $request, $id) {
        $incomes = Income::find($id);

        if ($request->input('incomeDescription') === null) {
            $description = "";
        } else {
            $description = $request->input('incomeDescription');
        }

        $incomes->category_id = $request->input('categoryList');
        $incomes->title = $request->input('incomeTitle');
        $incomes->amount = $request->input('incomeAmount');
        $incomes->description = $description;
        $incomes->save();
        return "success";
    }

    public function deleteIncome($id) {

        $incomes = Income::find($id);

        $incomes->status = "delete";
        $incomes->save();
        return "success";
    }

    public function getStore() {
        $store = Store::select('id', 'title')->get();
        return $store;
    }

    public function getBank() {
        $store = Bank::select('*')
                ->whereNotIn('id', [0])
                ->get();
        return $store;
    }

}
