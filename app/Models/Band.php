<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Band;
use App\Models\ExtraCharge;
use App\Models\Aliment;
use App\Models\Sale;

class Band extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'quantity', 'unit_price', 'status', 'loss', 
        'purchase_price', 'benefits', 'total_charges', 'provider', 'user_id'
    ];

    public function sales() {
        return $this->hasMany(Sale::class);
    }

    public function foods() {
        return $this->hasMany(Aliment::class)->orderBy('updated_at', 'desc');
    }

    public function extra_charges() {
        return $this->hasMany(ExtraCharge::class)->orderBy('updated_at', 'desc');
    }

    public function allBand() {
        return Band::orderBy('updated_at', 'desc')->get();
    }

    public function findBand($id) {
        return Band::find($id);
    }

    public function findBandsByMonth($month) {
        return Band::whereMonth('updated_at', $month)->get();
    }

    public function deleteBand($id) {
        return Band::find($id)->delete();
    }

    public function totalCharges() {
        $band_charges = floatval($this->purchase_price);
        $foods_charges =  $this->foods->sum('total_price');
        $extras_charges =  $this->extra_charges->sum('total_price');
        $total_charges = $band_charges + $foods_charges + $extras_charges;

        return $total_charges;
    }

    public function perfByMonth() {
        $performances = [];
        for ($i=1; $i < 13; $i++) {
            $total_sales_cost = (new Sale)->findSalesByMonth($i)->sum('total_price');
            $total_foods_cost = (new Aliment)->findFoodsByMonth($i)->sum('total_price');
            $total_extras_cost = (new ExtraCharge)->findExtrasByMonth($i)->sum('total_price');
            $total_bands_cost = (new Band)->findBandsByMonth($i)->sum('purchase_price');

            $total_charges = $total_bands_cost + $total_foods_cost + $total_extras_cost;
            if ($total_charges == 0) {
                $performance = 0;
            } else {
                $performance = number_format($total_sales_cost / $total_charges * 100);
            }
            array_push($performances, $performance);
        }

        return $performances;
    }
}
