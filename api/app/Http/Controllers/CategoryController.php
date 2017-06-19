<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function createCategory(Request $request){
        $category = new Category([
            'catTitle' => $request->input('catTitle'),
            'catType' => $request->input('catType'),
            'catStatus' => "active"
        ]);
        $category->save();

        return "success";
    }

    public function getCategory() {
        $categories = Category::select('id', 'title', 'type')->where('status', 'active')->get();

        return $categories;
    }
    public function getCategoryByIncome($id) {
        $categories = Category::select('title')->where('status', 'active')->where('id', $id)->get();

        return $categories;
    }


    public function getCategoryByType($data) {
        $categories = Category::select('id', 'title')->where('status', 'active')->where('type', $data)->get();
        return $categories;
    }

    public function editCategory($id){
        $categories = Category::all('id','title','type')->where('id', $id)->first();

        return $categories;
    }


    public function postEditCategory(Request $request,$id){
        $category = Category::find($id);

        $category->title = $request->input('catTitle');
        $category->type = $request->input('catType');
        $category->save();
        return "success";
    }

    public function deleteCat($id){

        $category = Category::find($id);

        $category->status = "delete";
        $category->save();
        return "success";
    }


}
