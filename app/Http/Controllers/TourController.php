<?php
/**
 * Created by PhpStorm.
 * User: IshanFx
 * Date: 3/14/2016
 * Time: 11:08 AM
 */

namespace App\Http\Controllers;


use App\Review;
use App\TourArea;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TourController extends Controller
{

    public function store(Request $request){
        $tour = new TourArea();
        $tour->name = '';
        $tour->location = '';
        $tour->description = '';
        $tour->climate = '';
        $tour->category = '';
        $tour->district = '';
        $tour->updated_at = Carbon::now();
        $tour->created_at = Carbon::now();

        $tour->save();
    }
    public function findall(){
        $tour = TourArea::find(2);
       return json_encode($tour);
    }

    public function findid($id){
        $tour = TourArea::where('id',$id)
            ->orderBy('id')
            ->take(10)
            ->get();
        return json_encode($tour);
    }


    public function findname($name){
        $tour = TourArea::where('name',$name)
            ->orderBy('id')
            ->take(10)
            ->get();
        return json_encode($tour);
    }

    public function finddistrict($district){

        $tour = TourArea::where('name',$district)
            ->orderBy('id')
            ->take(10)
            ->get();
        return json_encode($tour);
    }
    public function findcategory($category){
        $tour = TourArea::where('name',$category)
            ->orderBy('id')
            ->take(10)
            ->get();
        return json_encode($tour);
    }
}