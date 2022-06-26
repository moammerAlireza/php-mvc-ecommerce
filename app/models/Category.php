<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Category extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = ['name', 'slug'];
    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }



    public function transform($data)
    {
        $categories = array();
        foreach($data as $item){
            $added = new Carbon($item->created_at);
            array_push($categories,[
                'id'=>$item->id,
                'name'=>$item->name,
                'slug'=>$item->slug,
                'added'=> $added-> toFormattedDateString()
            ]);
        }
        return $categories;
    }
}