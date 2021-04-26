<?php

namespace App\Http\Controllers\API;

use App\Models\Movie;
use App\Http\Requests\MovieRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * created by console: php artisan make:controller API/MovieController --api
 * Class MovieController
 * @package App\Http\Controllers\API
 */
class ApiMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Movie::orderBy('title')->with('author')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(MovieRequest $request)
    {
        $validated = $request->validated();
        $movie = Movie::create($validated);
        $result = ['success'=>true];
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $movie = Movie::whereId($id)->with('author')->first();
        return response()->json(compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(MovieRequest $request, $id)
    {
        $validated = $request->validated();
        $movie = Movie::whereId($id)->first();
        $movie->update($validated);
        return response()->json(compact('movie'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $movie = Movie::destroy($id);
        return response()->json(['success' => "movie $id removed"]);
    }
}
