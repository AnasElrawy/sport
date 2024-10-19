<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardSystemRequest;
use App\Http\Requests\UpdateCardSystemRequest;
use App\Models\CardSystem;

class CardSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json([
            'message' => 'it is in card.'
          ], 200);
    }

    public function indexx()
    {
        //

        return view('cards.generate_cards');

        return response()->json([
            'message' => 'it is in card.'
          ], 200);
    }


    public function create()
    {
        //

        // return view('cards.generate_cards');

        return response()->json([
            'message' => 'it is in card.'
          ], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCardSystemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardSystemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardSystem  $cardSystem
     * @return \Illuminate\Http\Response
     */
    public function show(CardSystem $cardSystem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardSystem  $cardSystem
     * @return \Illuminate\Http\Response
     */
    public function edit(CardSystem $cardSystem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCardSystemRequest  $request
     * @param  \App\Models\CardSystem  $cardSystem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardSystemRequest $request, CardSystem $cardSystem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CardSystem  $cardSystem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardSystem $cardSystem)
    {
        //
    }

    public function card()
    {

        return view('cards.generate_cards');

        return response()->json([
            'message' => 'it is in card.'
          ], 200);
    }


    public function createCrard(Request $request)
    {

        // dd("aa");

        // return view('cards.generate_cards');

        return response()->json([
            'message' => 'it is in creat card.'
          ], 200);
    }


}
