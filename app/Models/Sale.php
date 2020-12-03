<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;

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

    public function allSale() {
        return Sale::all();
    }

    public function findSale($id) {
        return Sale::find($id);
    }

    public function deleteSale($id) {
        return Sale::find($id)->delete();
    }
}
