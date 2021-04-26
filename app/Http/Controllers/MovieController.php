<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Scard;

class MovieController extends Controller
{
   public function index() {
        $data = Movie::orderBy('title')->paginate( config('my.pagination_limit') );
        return view('public.movie.index', compact('data'));
   }

    public function show( $id ) {
        $data = Movie::whereId($id)->first();
        $added = Scard::where([
            'session_id'    => session()->getId(),
            'movie_id'      => $id,
        ])->pluck('quantity')->first();

        return view('public.movie.show', compact('data','added'));
    }
}
