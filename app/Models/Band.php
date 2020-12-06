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
        'purchase_price', 'benefits', 'provider', 'user_id'
    ];

    public function sales() {
        return $this->hasMany(Sale::class);
    }

    public function foods() {
        return $this->hasMany(Aliment::class);
    }

    public function extra_charges() {
        return $this->hasMany(ExtraCharge::class);
    }

    public function allBand() {
        return Band::all();
    }

    public function findBand($id) {
        return Band::find($id);
    }

    public function deleteBand($id) {
        return Band::find($id)->delete();
    }
}
