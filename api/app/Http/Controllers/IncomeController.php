<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function getIncome($id)
    {
        $incomes = Income::select('id', 'title', 'amount', 'category_id')
            ->with('category')
            ->where('status', 'active')
            ->where('user_id', $id)
            ->get();

        return $incomes;
    }

    public function createIncome(Request $request, $id)
    {

        if($request->input('incomeDescription')===null){
            $description = "";
        }else{
            $description=$request->input('incomeDescription');
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

    public function totalIncome()
    {
        $price = DB::table('incomes')->where('status', 'active')->sum('amount');
        $money = number_format($price, 2,".", "," );
        return $money;
    }
    public function editIncome($id){
        $incomes = Income::select('id','category_id','title','description','amount')->with('category')->where('id', $id)->first();

        return $incomes;
    }

    public function postEditIncome(Request $request,$id){
        $incomes = Income::find($id);

        if($request->input('incomeDescription')===null){
            $description = "";
        }else{
            $description=$request->input('incomeDescription');
        }

        $incomes->category_id = $request->input('categoryList');
        $incomes->title = $request->input('incomeTitle');
        $incomes->amount = $request->input('incomeAmount');
        $incomes->description = $description;
        $incomes->save();
        return "success";
    }

    public function deleteIncome($id){

        $incomes = Income::find($id);

        $incomes->status = "inactive";
        $incomes->save();
        return "success";
    }

}
