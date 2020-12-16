<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Band;
use App\Models\Sale;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_admin == 1) {
            return redirect('/');
        }

        $bands = (new Band)->allBand();
        $sales = (new Sale)->allSale();

        $sales_figure = $sales->sum('total_price');

        $monthly_performance = (new Band)->perfByMonth();

        $band_in_progress = Band::where('status', '!=', 'elapsed')->count();

        return view('home', compact('bands', 'sales', 'sales_figure', 'band_in_progress', 'monthly_performance'));
    }
}
