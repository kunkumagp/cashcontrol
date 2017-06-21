<?php

namespace App\Http\Controllers;

use App\Income;
use App\Store;
use App\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller {

    public function getIncome($id) {
        $incomes = Income::select('id', 'title', 'amount', 'category_id', 'store_id')
                ->with('category')
                ->with('store')
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
        $stl = $request->input('storeList');
        if ($stl === "1") {
            $accList = $request->input('accList');
        }else if ($stl !== 1) {
            $accList = NULL;
        }
        

        $incomes = new Income([
            'category_id' => $request->input('categoryList'),
            'user_id' => $id,
            'store_id' => $stl,
            'bank_id' => $accList,
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
    
    public function totalBankIncome($id) {
        $price = DB::table('incomes')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->where('store_id', 1)
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
        $stl = $request->input('storeList');
        if ($stl === "1") {
            $accList = $request->input('accList');
        }else if ($stl !== 1) {
            $accList = "0";
        }
        

        $incomes->category_id = $request->input('categoryList');
        $incomes->store_id = $stl;
        $incomes->bank_id = $accList;
        $incomes->title = $request->input('incomeTitle');
        $incomes->amount = $request->input('incomeAmount');
        $incomes->description = $description;
        $incomes->save();
        return "success";
    }

    public function deleteIncome($id) {

        $incomes = Income::find($id);
        $ica = $incomes->amount;
        $incomes->status = "delete";
        $incomes->save();
        
        $banks = Bank::find($incomes->bank_id);
        $ba = $banks->acc_total;
        $newAmount = $ba - $ica;
        $banks->acc_total = $newAmount;
        $banks->save();
        

        return "success";
    }

    public function getStore() {
        $store = Store::select('id', 'title')->get();
        return $store;
    }

    public function getTotalAmount($id, $bid) {

        $amount = DB::table('incomes')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->where('bank_id', $bid)
                ->sum('amount');

        $banks = Bank::select('acc_total')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->where('id', $bid)
                ->get();

        if ($banks !== $amount) {
            $bankAcc = Bank::find($bid);

            $bankAcc->acc_total = $amount;
            $bankAcc->save();
        }

//        dd($amount);

        return $amount;
    }

}
