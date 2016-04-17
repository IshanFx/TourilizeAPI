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
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Debug\Debug;

class PlaceController extends Controller
{


    public function store(Request $request,$token){
        if(User::checkToken($token)) {
            $validator = Validator::make($request->all(),
                [
                    'district' => 'required',
                    'name' => 'required',
                    'climate' => 'required',
                    'category' => 'required',
                    'description' => 'required',
                    'latitude'=>'required',
                    'longitude'=>'required'
                ]
            );

            if ($validator->fails()) {
                return json_encode(
                    [
                        "Message"=>"Fill All required Parameters"

                    ]
                );
            }
            else
            {
                $districtID  = District::districtId($request->district);
                $categoryID  = Category::categoryId($request->category);
                $latitude    = $request->latitude;
                $longitude   = $request->longitude;

                $place = new Place();
                $place->name = $request->name;
                $place->description = $request->description;
                $place->climate = $request->climate;
                $place->category = $categoryID;
                $place->district = $districtID;
                $place->updated_at = Carbon::now();
                $place->created_at = Carbon::now();

                $placeId = DB::table('place')->insertGetId(
                    [
                        'name' => $place->name,
                        'description' => $place->description,
                        'climate'=>$place->climate,
                        'category_id'=>$categoryID,
                        'district_id'=>$districtID,
                        'updated_at'=>Carbon::now(),
                        'created_at'=>Carbon::now()
                    ]
                );

                DB::update('update place set location=POINT(' . $latitude . ',' . $longitude . ') where id=' . $placeId . ' ');

                return response()->json(
                    [
                        'Id'=>$placeId,
                        'Name' =>  $place->name,
                        'Description' =>$place->description,
                        'Climate'=>$place->climate,
                        'Category'=>$request->category,
                        'District'=>$request->district,
                        'Latitude'=>$latitude,
                        'Longitude'=>$longitude
                    ]

                );
            }

        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }
    }
    /*
     * Get the all available places details.
     */

    public function findall($token){
        if(User::checkToken($token)) {
            $place = DB::select('
            SELECT place.id,place.name,x(location) as longitude,y(location) as latitude,
            description,climate,category.name as category,district.name as district
            FROM place
            JOIN category ON category.id = place.category_id
            JOIN district ON district.id = place.district_id

        ');

            return response()->json($place);
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }

    }
    /*
     * Search place based on id
     */
    public function findid($id,$token){
        if(User::checkToken($token)) {
            $place = DB::select('
            SELECT place.id,place.name,x(location) as longitude,y(location) as latitude,
            description,climate,category.name as category,district.name as district
            FROM place
            JOIN category ON category.id = place.category_id
            JOIN district ON district.id = place.district_id
            WHERE place.id='.$id.'
        ');

            return response()->json($place);
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }

    }

    /*
     * Search place based on name
     * */
    public function findname($name,$token){
        if(User::checkToken($token)) {
            $place = DB::select("
            SELECT place.id,place.name,x(location) as longitude,y(location) as latitude,
            description,climate,category.name as category,district.name as district
            FROM place
            JOIN category ON category.id = place.category_id
            JOIN district ON district.id = place.district_id
            WHERE place.name='".$name."' ");

            return response()->json($place);
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }

    }
    /*
     * Search place based on district
     * */
    public function finddistrict($name,$token){
        if(User::checkToken($token)) {
            $district = new District();

            $districtID = $district->districtId($name);

            $place = DB::select('
            SELECT place.id,place.name,x(location) as longitude,y(location) as latitude,
            description,climate,category.name as category,district.name as district
            FROM place
            JOIN category ON category.id = place.category_id
            JOIN district ON district.id = place.district_id
            WHERE place.district_id='.$districtID.'
        ');

            return response()->json($place);
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }

    }
    /*
     * Search place based on category
     * */
    public function findcategory($name,$token){
        if(User::checkToken($token)) {
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

            return response()->json($place);
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }

    }

    public function remove($id,$token){
        if(User::checkToken($token)) {
            Place::destroy($id);
            return response()->json(
                [
                    'Id'=>$id
                ]

            );
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }

    }

    public function update(Request $request,$id,$token){
        if(User::checkToken($token)) {
            $categoryId = Category::categoryId($request->category);
            $place = Place::find($id);

            Place::where('id', $id)
                ->update(
                    [
                        'climate' => $request->climate,
                        'category_id'=>$categoryId,
                        'description'=>$request->description
                    ]
                );

            return response()->json(
                [
                    'Id'=>$id,
                    'discription'=>$request->description,
                    'category'=>$request->category
                ]
            );
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }


    }

    public function storereview(Request $request,$token){
        if(User::checkToken($token)) {
            $review = new Review();
            $review->place_id = $request->placeid;
            $review->comment = $request->comment;
            $review->user = $request->user;
            $review->save();

            return response()->json(
                [
                    'Place_Id'=>$review->place_id,
                    'Comment'=>$review->comment,
                    'User'=>$request->name
                ]
            );
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }


    }

   /* public function showreview($id){
        $place = DB::select('
            select comment,user from review
            JOIN place ON review.place_id = place.ID
             WHERE review.place_id ='.$id.'
        ');
        return response()->json($place);
    }*/


    public function findnearlocation($latitude,$longitude,$count,$token){
        if(User::checkToken($token)) {
            $latitude = $latitude/10000;
            $longitude = $longitude/10000;

            $nearlocationdata = DB::select('
        SELECT  place.id,place.name,x(location) as latitude,y(location) as longitude,
                description,climate,category.name,district.name as district,
			    111.321 *
				DEGREES(ACOS(
					   COS(RADIANS( x(location)))
					 * COS(RADIANS("'.$latitude.'"))
					 * COS(RADIANS("'.$longitude.'"- y(location)))
					 + SIN(RADIANS(x(location)))
					 * SIN(RADIANS("'.$latitude.'")))) AS distance
			    FROM place
			    JOIN category ON place.category_id = category.id
			    JOIN district ON place.district_id = district.id
			    order by distance
			    LIMIT '.$count.';

  		');

            return response()->json($nearlocationdata);
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }

    }

    public function reviewfindId($placeid,$token){
        if(User::checkToken($token)) {
            $items = array();
            /* $places =  DB::select('
                select place.id as id,place.name as name,review.comment as comment from place JOIN review ON place.id=review.place_id
              ');*/
            $places =  DB::select('
          select id ,name from place WHERE id = '.$placeid.'
        ');


            $places = json_decode(json_encode($places),true);

            foreach($places as $place){
                $id = $place['id'];

                $reviews =  DB::select('
              select comment,user from review WHERE place_id ='.$id.'
            ');
                //$reviews = json_decode(json_encode($reviews),true);

                $name = $place['name'];
                $item = array
                (
                    'id' => $id,
                    'name' => $name,
                    'comments' => $reviews
                );

                //  array_push( $item['comments'],$reviews);
                array_push($items,$item);
                //$items[$id] = $item;
            }
            return response()->json($items);
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }

    }

    public function reviewdelete($reviewid,$token){
        if(User::checkToken($token)) {
            $review  = Review::find($reviewid);
            $review->delete();
            return response()->json(['id'=>$reviewid]);
        }
        else
        { return json_encode(
            [
                "Message"=>"Invalid Token"

            ]
        );
        }

    }
}