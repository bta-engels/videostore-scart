<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScardRequest;
use App\Models\OrderItem;
use App\Models\Scard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ScardController
 * @package App\Http\Controllers
 * @todo: remove obsolete shopping cart entries
 */
class ScardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Scard::where('session_id', session()->getId())->get();
        $priceTotal = 0;

        if($data->count()) {
            $data->each(function ($item) use (&$priceTotal) {
                $priceTotal += $item->sum_price;
            });
        }
        return view('public.scard.index', compact('data','priceTotal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $key = 'scard'.$id;

        if(!session()->getId()) {
            session()->start();
        }

        if(!session()->has($key)) {
            session()->setName($key);
        }
        $sID = session()->getId();

        $where = [
            'session_id'    => $sID,
            'movie_id'      => $id,
        ];
        $scard = Scard::where($where)->first() ?: new Scard();

        $data = [
            'session_id'    => $sID,
            'movie_id'      => $id,
            'quantity'      => ($scard->quantity > 0) ? $scard->quantity + 1 : 1,
        ];
        $scard->fill($data)->save();
        return redirect()->back();
    }

    public function increment($id)
    {
        $scard = Scard::find($id);
        $scard->quantity++;
        $scard->save();
        return redirect()->back();
    }

    public function decrement($id)
    {
        $scard = Scard::find($id);
        $scard->quantity--;
        $scard->quantity > 0 ? $scard->save() : $scard->delete();

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Scard::destroy($id);
        return $this->index();
    }
}
