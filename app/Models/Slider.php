<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];

    public function scopeCountry($query)
    {
        return $query->wherehas('ads', function($queryAd){
            $queryAd->where('country', country());
        });
    }//end fun

    public function ads()
    {
        return $this->belongsTo(Ad::class,'ad_id');
    }//end fun
}//end class
