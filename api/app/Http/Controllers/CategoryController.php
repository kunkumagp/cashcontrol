<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function createCategory(Request $request){
        $category = new Category([
            'title' => $request->input('catTitle'),
            'type' => $request->input('catType')
        ]);
        $category->save();

        return "success";
    }

    public function getCategory() {
//        $categories = Category::select('id','name','type')->all();
        $categories = Category::all('id','title','type');

        return $categories;

//        return view('app.index', ['categories' => $categories]);
    }
}
