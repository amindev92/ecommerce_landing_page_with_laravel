<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //

    public function view_category(){

        return view("admin.category");

    }

    public function add_category(Request $request){

        $data = new category;
        
        $data->category_name = $request->categoryName;

        $data->save();
        
        return redirect()->back()->with('message',"Successfully in add category");

    }

}
