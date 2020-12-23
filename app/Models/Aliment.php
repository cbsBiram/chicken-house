<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Aliment;
use App\Models\Band;

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

    public function band() {
        return $this->belongsTo(Band::class);
    }

    public function findFood($id) {
        return Aliment::find($id);
    }

    public function findFoodsByMonth($month) {
        return Aliment::whereMonth('updated_at', $month)->get();
    }

    public function deleteFood($id) {
        return Aliment::find($id)->delete();
    }
}
