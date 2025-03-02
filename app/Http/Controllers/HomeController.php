<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Contactus;
use App\Models\Customers_view;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;



class HomeController extends Controller
{
     public function home()
     {
      $product = Product::all();
      $customer = Customers_view::all();

      if(Auth::id())
      {
      $user = Auth::user();
      $userid = $user->id;
      $count = Cart::where('user_id',$userid)->count();
      }
      else
      {
        $count = '';
      }

        return view ('home.index', compact('product','customer','count'));
     }

     public function login_home()
     {
      $product = Product::all();
      $customer = Customers_view::all();

      if(Auth::id())
      {
      $user = Auth::user();
      $userid = $user->id;
      $count = Cart::where('user_id',$userid)->count();
      }
      else
      {
        $count = '';
      }

        return view ('home.index', compact('product','customer','count'));
     }

     public function product_details($id)
     {
      $data = Product::find($id);

      if(Auth::id())
      {
      $user = Auth::user();
      $userid = $user->id;
      $count = Cart::where('user_id',$userid)->count();
      }
      else
      {
        $count = '';
      }

      return view('home.product_details',compact('data','count'));
     }

     public function add_cart($id)
     {

      $product_id = $id;
      $user = Auth::user();
      $user_id = $user->id;

      $data = new Cart;
      $data->user_id = $user_id;
      $data->product_id = $product_id;
      $data->save();
      toastr()->timeout(10000)->closeButton()->success('Cart Added Successfully!.');
      return redirect()->back();
     }


    public function mycart()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
            
        }
        else
        {
            $count = '';
            $cart = [];
        }
    
        return view('home.mycart', compact('cart', 'count'));
    }

    public function remove($id)
{
    $cartItem = Cart::find($id);

    if ($cartItem) {
        $cartItem->delete();
    }

    toastr()->timeout(10000)->closeButton()->success('Cart Removed Successfully!.');
    return redirect()->back();
}

    public function about()
    {

      if(Auth::id())
      {
      $user = Auth::user();
      $userid = $user->id;
      $count = Cart::where('user_id',$userid)->count();
      }
      else
      {
        $count = '';
      }
        
        return view('home.about', compact('count'));
    }

    public function product()
    {
      $product = Product::all();

      if(Auth::id())
      {
      $user = Auth::user();
      $userid = $user->id;
      $count = Cart::where('user_id',$userid)->count();
      }
      else
      {
        $count = '';
      }

      return view('home.product', compact('product','count'));
    }

    public function contact()
    {

      if(Auth::id())
      {
      $user = Auth::user();
      $userid = $user->id;
      $count = Cart::where('user_id',$userid)->count();
      }
      else
      {
        $count = '';
      }
      return view('home.contact',compact('count'));
    }

    public function confirm_order(Request $request)
    {
      $name = $request->name;
      $address = $request->address;
      $phone = $request->phone;

      $userid = Auth::user()->id;
      $cart = Cart::where('user_id',$userid)->get();

      foreach($cart as $carts)
      {

        $order = new Order;
        $order->name = $name;
        $order->rec_address = $address;
        $order->phone = $phone;
        $order->user_id = $userid;
        $order->product_id = $carts->product_id;
        $order->save();
      }

      $cart_remove = Cart::where('user_id',$userid)->get();

      foreach($cart_remove as $remove)
      {
        $data = Cart::find($remove->id);
        $data->delete();
      }

      toastr()->timeout(10000)->closeButton()->success('Order placed Successfully!.'); 
      return redirect()->back();


    }

    public function myorders()
{
    $user = Auth::user()->id;

    $count = Cart::where('user_id',$user)->get()->count();

    $order = Order::where('user_id',$user)->get();

    return view('home.order',compact('count','order'));
}

public function contactus(Request $request)
    {
        $data = new contactus;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->status='In progress';

        if(Auth::id())
        {
        $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back();
    }

    public function stripe($value): View
{
    return view('home.stripe', compact('value'));
}


public function stripePost(Request $request,$value): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
                
        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        $address = $request->address;
        $phone = $request->phone;
  
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id',$userid)->get();
  
        foreach($cart as $carts)
        {
  
          $order = new Order;
          $order->name = $name;
          $order->rec_address = $address;
          $order->phone = $phone;
          $order->user_id = $userid;
          $order->payment_status = "paid";
          $order->product_id = $carts->product_id;
          $order->save();
        }
  
        $cart_remove = Cart::where('user_id',$userid)->get();
  
        foreach($cart_remove as $remove)
        {
          $data = Cart::find($remove->id);
          $data->delete();
        }
  
        toastr()->timeout(10000)->closeButton()->success('Payment placed Successfully!.'); 
        return redirect('mycart');
  
  
    }

}
