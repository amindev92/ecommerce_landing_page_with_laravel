<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    
    public function delete_category($id){
        $category = category::find($id);

        $category->delete();

        return redirect()->back()->with("message","delete category item successfully");

    }

    public function view_category(){

        $data = category::all();

        return view("admin.category", compact("data"));

    }

    public function add_category(Request $request){

        $data = new category;
        
        $data->category_name = $request->categoryName;

        $data->save();
        
        return redirect()->back()->with('message',"Successfully in add category");

    }

}
