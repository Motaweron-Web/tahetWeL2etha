<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded =  [];
    protected $appends = ['sub_categories'];

    public function getSubCategoriesAttribute()
    {
        $subIds = CategoriesSubCategories::where('category_id', $this->id)
            ->pluck('sub_category_id')->toArray();

        return Categories::whereIn('id', $subIds)->get();
    }

    public function categories_sub_categories()
    {
        return $this->hasMany(CategoriesSubCategories::class, 'category_id');
    }

}//end class
