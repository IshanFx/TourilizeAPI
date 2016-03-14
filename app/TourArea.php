<?php
/**
 * Created by PhpStorm.
 * User: IshanFx
 * Date: 3/14/2016
 * Time: 10:58 AM
 */

namespace App;

use App\Review;
use Illuminate\Database\Eloquent\Model;

class TourArea extends Model
{
    protected $table = 'tourarea';

    public $fillable = [];

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}