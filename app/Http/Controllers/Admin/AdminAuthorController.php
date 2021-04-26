<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Author;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\AuthorRequest;

class AdminAuthorController extends AdminController
{
   public function index() {
        $data = Author::orderBy('lastname')->paginate(config('my.pagination_limit'));

        return view('admin.author.index', compact('data'));
   }

    public function show( $id ) {
        $author = Author::whereId($id)->first();
        $movies=$author->movies;

        return view('admin.author.show', compact('author','movies'));
    }

    public function edit( $id = null ) {
        $data = ($id > 0) ? Author::whereId($id)->first() : null;
        $authors = Author::orderBy('lastname')->get();
        return view('admin.author.edit', compact('data','authors'));
    }

    public function store( AuthorRequest $request, $id = null) {
        $validated = $request->validated();
        // $path = $request->file('image')->store('images');
//            $file = request()->file('image');
//            $storage = Storage::disk('images')->putFileAs($file->getClientOriginalName(), $file);

        if( $id > 0 ) {
            Author::whereId($id)->update($validated);
        } else {
            Author::create($validated);
        }
        return redirect()->route('admin-author.index');
    }

    public function delete( $id ) {
        Author::destroy($id);
        return redirect()->route('admin-author.index');
    }
}
