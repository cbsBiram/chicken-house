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
        $band = new Band;
        $band->label = $request->get('label');
        $band->quantity = $request->get('quantity');
        $band->unit_price = $request->get('unit_price');
        $band->purchase_price = $request->get('unit_price') * $request->get('quantity');
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
        //
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
        //
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
}
