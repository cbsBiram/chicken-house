<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = (new Band)->allBand();
        return view('backend.band.index', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.band.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'label' => 'required|string',
            'quantity' => 'required|integer',
            'unit_price' => 'required'
        ]);
        $purchase_price = $request->get('unit_price') * $request->get('quantity');

        $band = new Band;
        $band->label = $request->get('label');
        $band->quantity = $request->get('quantity');
        $band->unit_price = $request->get('unit_price');
        $band->purchase_price = $purchase_price;
        $band->total_charges = $purchase_price;
        $band->provider = $request->get('provider');
        $band->user_id = auth()->user()->id;
        $band ->save();

        return redirect()->back()->with('message', 'Band created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $band = Band::find($id);
        
        return view('backend.band.show', compact('band'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $band = (new Band)->findBand($id);
        return view('backend.band.edit', compact('band'));
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
            'label' => 'required|string',
            'quantity' => 'required|integer',
            'unit_price' => 'required'
        ]);
        $purchase_price = $request->get('unit_price') * $request->get('quantity');
        
        $band = Band::find($id);
        $band->label = $request->get('label');
        $band->quantity = $request->get('quantity');
        $band->unit_price = $request->get('unit_price');
        $band->purchase_price = $purchase_price;
        $band->total_charges = $purchase_price + $band->foods->sum('total_price')
            + $band->extra_charges->sum('total_price');
        $band->loss = $request->get('loss');
        $band->status = $request->get('status');
        $band->provider = $request->get('provider');
        $band ->save();

        return redirect()->route('band.index')->with('message', 'Band updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Band)->deleteBand($id);
        return redirect()->route('band.index')->with('message', 'Band deleted successfully!');
    }

    /**
     * Get all bands for the frontend
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getBands() {
        $bands = (new Band)->allBand();
        return view('band', compact('bands'));
    }

    /**
     * Get details of a band for the frontend
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getBandDetails($band_id) {
        $band = Band::find($band_id);
        $foods = $band->foods()->get();
        $extras = $band->extra_charges()->get();

        return view('band-details', compact('band', 'foods', 'extras'));
    }
}
