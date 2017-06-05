<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function createCategory(Request $request){
        $category = new Category([
            'title' => $request->input('catTitle'),
            'type' => $request->input('catType'),
            'status' => "active"
        ]);
        $category->save();

        return "success";
    }

    public function getCategory() {
//        $categories = Category::all('id','title','type');
        $categories = Category::select('id', 'title', 'type')->where('status', 'active')->get();

        return $categories;}

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

        $category->status = "inactive";
        $category->save();
        return "success";
    }


}
