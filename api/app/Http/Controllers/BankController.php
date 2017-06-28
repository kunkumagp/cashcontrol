<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Income;
use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller {

    public function getBank($id) {
        $banks = Bank::select('id', 'title', 'type', 'acc_no', 'acc_total')
        ->where('status', 'active')
        ->where('user_id', $id)
        ->get();

        return $banks;
    }

    public function createBank(Request $request, $id) {

        $banks = new Bank([
            'user_id' => $id,
            'title' => $request->input('bankTitle'),
            'type' => $request->input('accType'),
            'acc_no' => $request->input('accNumber'),
            'acc_total' => "0",
            'status' => 'active'
        ]);
        $banks->save();
        return "success";
    }

    public function editBank($id) {
        $banks = Bank::select('id', 'title', 'type', 'acc_no')->where('id', $id)->first();

        return $banks;
    }

    public function postEditBank(Request $request, $id) {
        $banks = Bank::find($id);
        $banks->title = $request->input('bankTitle');
        $banks->type = $request->input('accType');
        $banks->acc_no = $request->input('accNumber');
        $banks->save();
        return "success";
    }

    public function deleteBank($id){

        $incomes = Bank::find($id);

        $incomes->status = "delete";
        $incomes->save();
        return "success";
    }
    
    public function viewAccDetails($id) {
        
        $incomes = Income::select('updated_at', 'title', 'amount', 'category_id', 'store_id', 'id')
                ->with('category')
                ->with('store')
                ->where('status', 'active')
                ->where('bank_id', $id)
                ->where('store_id', 1)
                ->get()
                ->toArray();

        $expenses = Expense::select('updated_at', 'title', 'amount', 'category_id', 'store_id', 'id')
                ->with('category')
                ->with('store')
                ->where('status', 'active')
                ->where('bank_id', $id)
                ->where('store_id', 1)
                ->get()
                ->toArray();
        
        
        
        $all = array_merge($incomes, $expenses);
        

        return $all;
    }
    
    
    public function totalAcc($id) {
        $price = DB::table('incomes')
                ->where('status', 'active')
                ->where('bank_id', $id)
                ->sum('amount');
        $money = number_format($price, 2, ".", ",");
        
        return $money;
    }
    
    public function accNo($id) {
        $banks = Bank::select('acc_no')->where('id', $id)->first();

        return $banks->acc_no;
    }
    
    public function getAccDetails($id) {
        $incomes = Bank::select('id', 'title', 'amount', 'category_id', 'store_id')
                ->with('category')
                ->with('store')
                ->where('status', 'active')
                ->where('user_id', $id)
                ->get();

        return $incomes;
    }

}
