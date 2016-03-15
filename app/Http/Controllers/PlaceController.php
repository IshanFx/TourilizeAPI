<?php
/**
 * Created by PhpStorm.
 * User: IshanFx
 * Date: 3/14/2016
 * Time: 11:08 AM
 */

namespace App\Http\Controllers;


use App\Category;
use App\District;
use App\Place;
use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Debug\Debug;

class PlaceController extends Controller
{

    public function store(Request $request){
        $districtID  = $this->districtId($request->get('district'));
        $categoryID  = $this->categoryId($request->get('category'));
        $place = new Place();
        $place->name = $request->get('name');
        $place->location =$request->get('name');
        $place->description = $request->get('description');
        $place->climate = $request->get('climate');
        $place->category = $categoryID;
        $place->district = $districtID;
        $place->updated_at = Carbon::now();
        $place->created_at = Carbon::now();
        $place->save();

        return json_encode($place);
    }

    /*
     * Get the all available places details.
     * */
    public function findall(){
        $place = DB::select('
            SELECT place.id,place.name,x(location) as longitude,y(location) as latitude,
            description,climate,category.name as category,district.name as district
            FROM place
            JOIN category ON category.id = place.category_id
            JOIN district ON district.id = place.district_id

        ');
        return json_encode($place);
    }

    /*
     * Search place based on id
     * */
    public function findid($id){

        $place = DB::select('
            SELECT place.id,place.name,x(location) as longitude,y(location) as latitude,
            description,climate,category.name as category,district.name as district
            FROM place
            JOIN category ON category.id = place.category_id
            JOIN district ON district.id = place.district_id
            WHERE place.id='.$id.'
        ');

        return json_encode($place);
    }

    /*
     * Search place based on name
     * */
    public function findname($name){

        $place = DB::select('
            SELECT place.id,place.name,x(location) as longitude,y(location) as latitude,
            description,climate,category.name as category,district.name as district
            FROM place
            JOIN category ON category.id = place.category_id
            JOIN district ON district.id = place.district_id
            WHERE place.name='.$name.'
        ');
        return json_encode($place);
    }

    /*
     * Search place based on district
     * */
    public function finddistrict($name){
        $district = new District();

        $districtID = $district->districtId($district);

        $place = DB::select('
            SELECT place.id,place.name,x(location) as longitude,y(location) as latitude,
            description,climate,category.name as category,district.name as district
            FROM place
            JOIN category ON category.id = place.category_id
            JOIN district ON district.id = place.district_id
            WHERE place.district_id='.$districtID.'
        ');

        return json_encode($place);
    }

    /*
     * Search place based on category
     * */
    public function findcategory($name){
        $category = new Category();
        $categoryID = $category->categoryId($name);

        $place = DB::select('
            SELECT place.id,place.name,x(location) as longitude,y(location) as latitude,
            description,climate,category.name as category,district.name as district
            FROM place
            JOIN category ON category.id = place.category_id
            JOIN district ON district.id = place.district_id
            WHERE place.category_id='.$categoryID.'
        ');

        return json_encode($place);
    }

    public function remove($id){
       Place::destroy($id);
    }

    public function update($id){

    }

    public function storereview(){}

    public function showreview($id){
        $place = Review::where("place_id",$id)
                ->get();

        return json_encode($place);
    }


    public function findnearlocation($latitude,$longitude,$count){
        $latitude = $latitude/10000;
        $longitude = $longitude/10000;

        $nearlocationdata = DB::select('
        SELECT  place.id,place.name,x(location) as latitude,y(location) as longitude,
                description,climate,category.category,district.name as district,
			    111.321 *
				DEGREES(ACOS(
					   COS(RADIANS( x(location)))
					 * COS(RADIANS("'.$latitude.'"))
					 * COS(RADIANS("'.$longitude.'"- y(location)))
					 + SIN(RADIANS(x(location)))
					 * SIN(RADIANS("'.$latitude.'")))) AS distance
			    FROM place
			    JOIN category ON place.category = category.id
			    JOIN district ON place.district = district.id
			    order by distance
			    LIMIT '.$count.';

  		');

        return json_encode($nearlocationdata);
    }
}