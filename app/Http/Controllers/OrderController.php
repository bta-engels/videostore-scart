<?php

namespace App\Http\Controllers;

use App\Events\MovieOrdered;
use App\Http\Requests\CustomerRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Scard;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CustomerRequest $request)
    {
        $validated  = $request->validated();
        $customer   = Customer::whereEmail($request->post('email'))->first();

        if (!$customer) {
            $customer = Customer::create($validated);
        }

        $scard      = Scard::whereSessionId( session()->getId() )->get();
        $scardIds   = [];
        $orderItemData = [];
        $priceTotal = 0;

        if($scard->count()) {
            $order = new Order();

            foreach ($scard as $item) {
                $scardIds[] = $item->id;
                $orderItemData[] = [
                    'movie_id'      => $item->movie_id,
                    'quantity'      => $item->quantity,
                    'price'         => $item->sum_price,
                ];
                $priceTotal += $item->sum_price;
            }

            $order->price_total = $priceTotal;

            $order->customer()->associate($customer);
            $order->save();

            $order->orderItems()->createMany($orderItemData);
            // remove shopping cart entries
            Scard::destroy($scardIds);
            // @todo: redirect to order detail confirmation page
            // @todo: payment stuff
            // trigger Order Event
            event(new MovieOrdered($order));
        }
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }
}
