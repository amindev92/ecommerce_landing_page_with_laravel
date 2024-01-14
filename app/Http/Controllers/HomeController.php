<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\cart;
use App\Models\order;
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

    public function show_cart()
    {

        if (Auth::id()) {

            $userId = Auth::user()->id;
            $cart = cart::where("user_id", "=", $userId)->get();

            return view("home.showcart", compact("cart"));
        } else {
            return redirect('login');
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

    public function remove_cart($id)
    {

        $cart = cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function cash_order(){

        $user = Auth::user();

        $products = cart::where('user_id', $user->id)->get();

        foreach ($products as $product) {

            $order = new order();
            $order->user_id = $user->id;
            $order->name = $product->name;
            $order->email = $product->email;
            $order->address = $product->address;
            $order->phone = $product->phone;
            $order->product_id = $product->product_id;
            $order->product_title = $product->product_title;
            $order->image = $product->product_image;
            $order->price = $product->product_price;
            $order->quantity = $product->product_quantity;

            $order->payment_status = "cash on delivery";
            $order->delivery_status = "processing";

            $order->save();

            $cartId = $product->id;
            $cart = cart::find($cartId);
            $cart->delete();
        }

        return redirect()->back();



    }
}
