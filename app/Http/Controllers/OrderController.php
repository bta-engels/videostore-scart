<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Scart;
use App\Models\Customer;
use App\Events\MovieOrdered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CustomerRequest;

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

        $scart      = Scart::whereSessionId( session()->getId() )->get();
        $scartIds   = [];
        $orderItemData = [];
        $priceTotal = 0;

        if($scart->count()) {
            $order = new Order();

            foreach ($scart as $item) {
                $scartIds[] = $item->id;
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
            Scart::destroy($scartIds);
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
