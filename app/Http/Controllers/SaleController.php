<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = (new Sale)->allSale();
        return view('backend.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bands = Band::where('status', '!=', 'mature')->get();
        return view('backend.sale.create', compact('bands'));
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
            'quantity' => 'required|integer',
            'price' => 'required',
            'band' => 'required',
        ]);

        $sale = new Sale;
        $sale->quantity = $request->get('quantity');
        $sale->price = $request->get('price');
        $sale->band_id = $request->get('band');
        $sale->buyer = $request->get('buyer');
        $sale->total_price = $request->get('quantity') * $request->get('price');
        $sale->save();

        return redirect()->back()->with('message', 'Sale created successfully');
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
        $sale = (new Sale)->findSale($id);
        $bands = Band::where('status', '!=', 'mature')->get();
        return view('backend.sale.edit', compact('sale', 'bands'));
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
            'price' => 'required',
            'band' => 'required',
        ]);

        $sale = Sale::find($id);
        $sale->quantity = $request->get('quantity');
        $sale->price = $request->get('price');
        $sale->band_id = $request->get('band');
        $sale->buyer = $request->get('buyer');
        $sale->total_price = $request->get('quantity') * $request->get('price');
        $sale->save();

        return redirect()->route('sale.index')->with('message', 'Sale updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
