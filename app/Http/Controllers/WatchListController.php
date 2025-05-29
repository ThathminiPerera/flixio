<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WatchList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WatchListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $watchlists = WatchList::where('user_id', Auth::user()->id)
            ->join('movies', 'watchlists.movie_id', '=', 'movies.id')
            ->select('movies.*')
            ->get()
            ->toArray();


        return view('watchlist', ['watchlists' => $watchlists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $watchList = WatchList::create([
            'user_id' => Auth::user()->id,
            'movie_id' => $request->movie_id,
        ]);

        return redirect()->route('movie.show', $request->movie_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $watchlist = WatchList::where('user_id', Auth::user()->id)
            ->where('movie_id', $id)
            ->first();

        if ($watchlist) {
            $watchlist->delete();
        }

        return redirect()->route('watchList');
    }
}
