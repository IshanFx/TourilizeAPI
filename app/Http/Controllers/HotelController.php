<?php
/**
 * Created by PhpStorm.
 * User: IshanFx
 * Date: 3/14/2016
 * Time: 12:48 PM
 */

namespace App\Http\Controllers;


use App\District;
use App\Hotel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    /*
   * Create hotel details.
   */

    public function create(Request $request,$token){
        if(User::checkToken($token)) {

            $validator = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'description' => 'required',
                    'district' => 'required'
                ]
            );

            if ($validator->fails()) {
                return json_encode(
                    [
                        "Error Code" => "500",
                        "Message" => "Fill All required Parameters"
                    ]
                );
            } else {
                $districtID = District::districtId($request->district);
                $latitude = $request->latitude;
                $longitude = $request->longitude;

                $hotel = new Hotel();
                $hotel->name = $request->name;
                $hotel->description = $request->description;
                $hotel->telephone = $request->telephone;
                $hotel->address = $request->address;
                $hotel->districtid = $districtID;
                $hotel->email = $request->email;
                $hotel->updated_at = Carbon::now();
                $hotel->created_at = Carbon::now();

                $hotelId = DB::table('hotel')->insertGetId(
                    [
                        'name' => $hotel->name,
                        'description' => $hotel->description,
                        'telephone' => $hotel->telephone,
                        'address' => $hotel->address,
                        'email' => $hotel->email,
                        'district_id' => $districtID,
                        'updated_at' => Carbon::now(),
                        'created_at' => Carbon::now()
                    ]
                );

                DB::update('update hotel set location=POINT(' . $latitude . ',' . $longitude . ') where id=' . $hotelId . ' ');

                return response()->json(
                    [
                        'Id' => $hotelId,
                        'Name' => $hotel->name,
                        'Description' => $hotel->description,
                        'address' => $hotel->address,
                        'district' => $hotel->district,
                        'email' => $request->email,
                        'telephone' => $request->telephone,
                        'Latitude' => $latitude,
                        'Longitude' => $longitude
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
   * Remove hotel details.
   */

    public function remove($id,$token){
        if(User::checkToken($token)) {
            Hotel::destroy($id);
            return response()->json(['id'=>$id]);
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
    * Update hotel details.
    */

    public function update(Request $request,$id,$token){
        if(User::checkToken($token)) {
            Hotel::where('id', $id)
                ->update(
                    [
                        'name' => $request->name,
                        'address'=> $request->address,
                        'email'=> $request->email,
                        'description'=> $request->description,
                        'telephone'=>$request->telephone
                    ]
                );
            return response()->json(
                [
                    'id'=>$id,
                    'name' => $request->name,
                    'address'=> $request->address,
                    'email'=> $request->email,
                    'description'=> $request->description,
                    'telephone'=>$request->telephone
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

    /*
     * Get the all available hotel details.
     */

    public function findall($token){
        if(User::checkToken($token)) {
            $hotel = DB::select('
            SELECT hotel.id,hotel.name,address,x(location) as latitude,
            y(location)as longitude,description,district.name as district,telephone as contact,email
            FROM hotel
            JOIN district ON hotel.district_id=district.id;

        ');

            return response()->json($hotel);
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
     * Search hotel by name
     */
    public function findhotel($name,$token){

        if(User::checkToken($token)) {

            $hotel = DB::select("
            SELECT hotel.id,hotel.name,address,x(location) as latitude,
            y(location) as longitude,description,district.name as district,telephone,email
            FROM hotel
            JOIN district ON hotel.district_id=district.id
            WHERE hotel.name ='" . $name . "' ");

            return response()->json($hotel);

        }
    }

    public function findhoteldistrict($name,$token){
        if(User::checkToken($token)) {
            $district = new District();
            $districtID =  $district->districtId($name);

            $hotel = DB::select('
            SELECT hotel.id,hotel.name,address,x(location) as latitude,
            y(location) as longitude,description,district.name as district,telephone as contact,email
            FROM hotel
            JOIN district ON hotel.district_id=district.id
            WHERE district_id ='.$districtID.'
        ');

            return response()->json($hotel);
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