<?php
/**
 * Created by PhpStorm.
 * User: IshanFx
 * Date: 3/14/2016
 * Time: 10:59 AM
 */

namespace App;

use App\TourArea;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    protected $primaryKey = 'ID';
    public $fillable = [];

    public function place()
    {
        return $this->belongsTo('Place','id');
    }
}