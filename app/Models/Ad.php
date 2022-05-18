<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $guarded = [];

    protected $appends = ['is_followed'];

    public function getIsFollowedAttribute()
    {
        return auth()->check() && auth()->user()->follows()->where('ad_id', $this->id)->count() > 0;
    }

    public function scopeCountry($query)
    {
        return $query->where('country', country());
    }//end fun

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function scopeIsSpecial($query)
    {
        return $query->wherehas('categories', function ($queryAd) {
            $queryAd->where('is_special', true);
        });
    }//end fun

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }//end fun

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(AdImages::class, 'ad_id');
    }//end fun


    /////////////////////////////////////// static ///////////////////////////////////////////////
    public static function deleteImages($ad_id)
    {
        $images = AdImages::where('ad_id', $ad_id)->get();
        foreach ($images as $image) {
            unlink(public_path($image->image));
            $image->delete();
        }
    }//end fun

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public static function deleteImage($image_id)
    {
        $image = AdImages::find($image_id);
        unlink(public_path($image->image));
        $image->delete();
    }//end fun
}//end class
