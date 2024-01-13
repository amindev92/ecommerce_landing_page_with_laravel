<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\cart;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\product;
use Illuminate\Http\Request; 

// use GuzzleHttp\Psr7\Request;

class HomeController extends Controller
{

    public function product_details($id)
    {

        $product = Product::find($id);

        return view("home.product_details", compact("product"));
    }

    public function index()
    {

        $products = product::paginate(3);


        return view("home.userpage", compact("products"));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $products = product::paginate(3);

        if ($usertype == "1") {
            return view("admin.home");
        } else {
            return view("home.userpage", compact("products"));
        }
    }


    public function add_cart(Request $request, $id)
    {

        if (Auth::id()) {

            $user = Auth::user();
            $product = Product::find($id);
            $cart = new cart();

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->address = $user->address;
            $cart->phone = $user->phone;

            $cart->user_id = $user->id;

            $cart->product_id = $product->id;
            $cart->product_title = $product->product_title;
            $cart->image = $product->product_image;
            $cart->price = $product->product_price;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back()->with('message', 'Add to cart');
        } else {
            return redirect('login');
        }
    }
}
