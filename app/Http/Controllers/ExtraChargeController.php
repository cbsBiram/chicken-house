<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\ExtraCharge;

class ExtraChargeController extends Controller
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

    public function createExtra($band_id)
    {
        return view('backend.extra.create', compact('band_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storeExtra(Request $request, $band_id) {
        $this->validate($request, [
            'quantity' => 'required|integer',
            'label' => 'required',
            'price' => 'required'
        ]);

        $extra = new ExtraCharge;
        $extra->quantity = $request->get('quantity');
        $extra->label = $request->get('label');
        $extra->price = $request->get('price');
        $extra->total_price = $request->get('price') * $request->get('quantity');
        $extra->band_id = $band_id;
        $extra->save();

        $band = (new Band)->findBand($band_id);
        $band->total_charges = floatval($band->purchase_price) + $band->extra_charges->sum('total_price') 
            + $band->foods->sum('total_price');
        $band->save();

        return redirect()->back()->with('message', 'Extras charges created successfully');
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
        $extra = (new ExtraCharge)->findExtra($id);
        $bands = (new Band)->allBand();
        return view('backend.extra.edit', compact('extra', 'bands'));
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
            'label' => 'required',
            'price' => 'required',
            'band' => 'required'
        ]);
        
        
        $extra = (new ExtraCharge)->findExtra($id);
        $extra->quantity = $request->get('quantity');
        $extra->label = $request->get('label');
        $extra->price = $request->get('price');
        $extra->total_price = $request->get('price') * $request->get('quantity');
        $extra->band_id = $request->get('band');
        $extra ->save();

        $band = (new Band)->findBand($request->get('band'));
        $band->total_charges = floatval($band->purchase_price) + $band->extra_charges->sum('total_price') 
            + $band->foods->sum('total_price');
        $band->save();

        return redirect()->route('band.index')->with('message', 'Extras charges updated successfully');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new ExtraCharge)->deleteExtra($id);
        return redirect()->route('band.index')->with('message', 'Extras charges deleted successfully!');
    }
}
