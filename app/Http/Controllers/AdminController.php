<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{

    public function print($id){

        $order = order::find($id); 
        $pdf = PDF::loadView("admin.pdf", compact("order"));

        return $pdf->download("order_details.pdf");
    }

    public function view_orders(){

        $orders = order::all();

        return view("admin.viewOrders", compact("orders"));

    }

    public function update_product_item(Request $request, $id)
    {
        $product = product::find($id);

        $product->product_title = $request->product_title;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        $product->product_category = $request->product_category;
        $product->product_discount = $request->discount_price;
        $product->product_quantity = $request->product_quantity;


        $image = $request->product_image;
        if ($image) {
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $request->product_image->move('product_img', $imageName);
            $product->product_image = $imageName;
        }
        $product->save();

        return redirect()->back()->with('message', 'update product succesfully');
    }

    public function update_product($id)
    {
        $product = product::find($id);
        $category = category::all();
        return view("admin.update_product", compact("product", "category"));
    }

    public function delete_product($id)
    {

        $product = product::find($id);

        $product->delete();

        return redirect()->back()->with("message", "delete product item successfully");
    }

    public function show_product()
    {

        $products = product::all();
        return view("admin.show_product", compact("products"));
    }

    public function add_product_item(Request $request)
    {

        $product = new product;

        $product->product_title = $request->product_title;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        $product->product_category = $request->product_category;
        $product->product_discount = $request->discount_price;
        $product->product_quantity = $request->product_quantity;


        $image = $request->product_image;
        $imageName = time() . "." . $image->getClientOriginalExtension();
        $request->product_image->move('product_img', $imageName);
        $product->product_image = $imageName;

        $product->save();

        return redirect()->back()->with('message', 'add product succesfully');
    }

    public function view_product()
    {

        $category = category::all();

        return view("admin.product", compact("category"));
    }

    public function delete_category($id)
    {
        $category = category::find($id);

        $category->delete();

        return redirect()->back()->with("message", "delete category item successfully");
    }

    public function view_category()
    {

        $data = category::all();

        return view("admin.category", compact("data"));
    }

    public function add_category(Request $request)
    {

        $data = new category;

        $data->category_name = $request->categoryName;

        $data->save();

        return redirect()->back()->with('message', "Successfully in add category");
    }
}
