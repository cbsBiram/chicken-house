<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Band;
use App\Models\ExtraCharge;

class ExtraCharge extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'price', 'quantity', 'total_price', 'band_id'
    ];

    public function band() {
        return $this->belongsTo(Band::class);
    }

    public function findExtra($id) {
        return ExtraCharge::find($id);
    }

    public function findExtrasByMonth($month) {
        return ExtraCharge::whereMonth('updated_at', $month)->get();
    }

    public function deleteExtra($id) {
        return ExtraCharge::find($id)->delete();
    }
}
