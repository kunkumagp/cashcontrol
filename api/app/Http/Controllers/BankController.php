<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;

class BankController extends Controller {

    public function getBank() {
        $banks = Bank::select('id', 'title', 'type', 'acc_no')
        ->where('status', 'active')
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

}
