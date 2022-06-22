<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class SubCategory extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable = ['name', 'slug', 'category_id'];
    protected $dates = ['deleted_at'];



    public function transform($data)
    {
        $subcategories = array();
        foreach($data as $item){
            $added = new Carbon($item->created_at);
            array_push($categories,[
                'id'=>$item->id,
                'name'=>$item->name,
                'category_id'=>$item->category_id,
                'slug'=>$item->slug,
                'added'=> $added-> toFormattedDateString()
            ]);
        }
        return $subcategories;
    }
}