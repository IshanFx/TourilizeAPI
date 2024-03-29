<?php
/**
 * Created by PhpStorm.
 * User: IshanFx
 * Date: 3/14/2016
 * Time: 10:57 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Guider extends Model
{
    protected $table = 'guider';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    public $fillable = [];

    public function categories(){
        return $this->belongsTo('App\Category');
    }
}