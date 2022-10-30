<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function show(User $user)
  {
        return view('order.show', [
            "orders" => Order::where('user_id', '=', "$user->id")
                ->where("is_shipped", "=", 0 )
                ->get()
        ]);
  }


  public function showhisto(User $user)
  {
        return view('order.show', [
            "orders" => Order::where('user_id', '=', "$user->id")
                ->where("is_shipped", "=", 1 )
                ->get()
        ]);
  }
}
