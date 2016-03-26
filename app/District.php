<?php
/**
 * Created by PhpStorm.
 * User: IshanFx
 * Date: 3/15/2016
 * Time: 7:29 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';


    public static function districtId($name){
        $districtID =  District::where('name',$name)->first();
        return $districtID->ID;
    }
}