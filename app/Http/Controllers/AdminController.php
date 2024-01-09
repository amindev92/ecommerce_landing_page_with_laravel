<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function add_product_item(Request $request){

        $product = new product;

        $product->product_title = $request->product_title;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        $product->product_category = $request->product_category;
        $product->product_discount = $request->discount_price;
        $product->product_quantity = $request->product_quantity;


        $image = $request->product_image;
        $imageName = time().".".$image->getClientOriginalExtension();
        $request->product_image->move('product_img', $imageName);
        $product->product_image = $imageName;

        $product->save();

        return redirect()->back()->with('message','add product succesfully');

    }

    public function view_product(){

        $category = category::all();

        return view("admin.product", compact("category"));

    }
    
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
