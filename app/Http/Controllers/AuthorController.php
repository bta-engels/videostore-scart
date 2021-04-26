<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Author;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
   public function index() {
        $data = Author::orderBy('lastname')->paginate(config('my.pagination_limit'));

        return view('public.author.index', compact('data'));
   }

    public function show( $id ) {
        $author = Author::whereId($id)->first();
        $movies=$author->movies;

        return view('public.author.show', compact('author','movies'));
    }

}
