<?php
/**
 * Created by PhpStorm.
 * User: IshanFx
 * Date: 3/14/2016
 * Time: 11:01 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'ID';

    public static function categoryId($name){
        $categoryID = Category::where('NAME',$name)->first();
        return $categoryID->ID;
    }

    public function guiders(){
        return $this->hasMany('App\Guider');
    }
}