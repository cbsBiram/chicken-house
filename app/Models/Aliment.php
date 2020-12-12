<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Aliment;

class Aliment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_price', 'type', 'quantity', 'weight', 'price',
        'quantity_consumed', 'band_id'
    ];

    public function findFood($id) {
        return Aliment::find($id);
    }

    public function findFoodsByBand($bandId) {
        return Aliment::where('band_id', $bandId)->get();
    }

    public function deleteFood($id) {
        return Aliment::find($id)->delete();
    }
}
