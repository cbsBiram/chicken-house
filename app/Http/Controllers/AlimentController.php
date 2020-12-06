<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aliment;
use App\Models\Band;

class AlimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createFood($band_id)
    {
        return view('backend.food.create', compact('band_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $band_id)
    {
        //
    }

    public function storeFood(Request $request, $band_id) {
        $this->validate($request, [
            'quantity' => 'required|integer',
            'type' => 'required',
            'weight' => 'required',
            'price' => 'required'
        ]);

        $food = new Aliment;
        $food->quantity = $request->get('quantity');
        $food->type = $request->get('type');
        $food->weight = $request->get('weight');
        $food->price = $request->get('price');
        $food->total_price = $request->get('price') * $request->get('quantity');
        $food->band_id = $band_id;

        $food->save();
        return redirect()->back()->with('message', 'Food charges created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = (new Aliment)->findFood($id);
        $bands = (new Band)->allBand();
        return view('backend.food.edit', compact('food', 'bands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'quantity' => 'required|integer',
            'type' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'band' => 'required'
        ]);
        
        
        $food = (new Aliment)->findFood($id);
        $food->quantity = $request->get('quantity');
        $food->type = $request->get('type');
        $food->weight = $request->get('weight');
        $food->price = $request->get('price');
        $food->total_price = $request->get('price') * $request->get('quantity');
        $food->band_id = $request->get('band');
        $food ->save();

        return redirect()->route('band.index')->with('message', 'Food charges updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Aliment)->deleteFood($id);
        return redirect()->route('band.index')->with('message', 'Food charges deleted successfully!');
    }
}
