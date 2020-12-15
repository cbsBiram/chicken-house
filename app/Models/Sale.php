<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use App\Models\Band;

class Sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity', 'price', 'status', 'buyer', 'band_id'
    ];

    public function band() {
        return $this->belongsTo(Band::class);
    }

    public function allSale() {
        return Sale::orderBy('updated_at', 'desc')->get();
    }

    public function findSale($id) {
        return Sale::find($id);
    }

    public function findSalesByMonth($month) {
        return Sale::whereMonth('updated_at', $month)->get();
    }

    public function deleteSale($id) {
        return Sale::find($id)->delete();
    }
}
