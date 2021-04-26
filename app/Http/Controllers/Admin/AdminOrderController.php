<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends AdminController
{
   public function index() {
        $data = Order::orderBy('created_at')->paginate(config('my.pagination_limit'));
        return view('admin.order.index', compact('data'));
   }

    public function show( $id ) {
        $data = Order::whereId($id)->first();
        $priceTotal = 0;
        $data->orderItems->each(function($item) use (&$priceTotal) {
            $priceTotal += $item->price;
        });
        return view('admin.order.show', compact('data','priceTotal'));
    }

    public function edit( $id ) {
        $data = Order::whereId($id)->first();
        return view('admin.order.edit', compact('data'));
    }

    public function store( Request $request, $id ) {
        $done   = !!$request->post('done');
        $order  = Order::whereId($id)->first();

        $order->done = null;
        $order->done_at = null;

        if( true === $done ) {
            $order->done = 1;
            $order->done_at = Carbon::now(config('app.timezone'));
        }
        $order->save();
        return redirect()->route('admin-order.index');
    }

    public function delete( $id ) {
        $order = Order::whereId($id)->first();
        $order->orderItems()->delete();
        $order->delete();
        return redirect()->route('admin-order.index');
    }
}
