<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(5);
        return view('admin.orders.order', compact('orders'));
    }
}
