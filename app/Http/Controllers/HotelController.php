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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'Name' => 'required',
                'Description' => 'required',
                'District' => 'required',
                'Location' => 'required',
            ]
        );

        if ($validator->fails()) {
            return json_encode(
                [
                    "Error Code"=>"500",
                    "Message"=>"Fill All required Parameters"
                ]
            );
        }
        else{
            $districtID  = District::districtId($request->district);
            $latitude    = $request->latitude;
            $longitude   = $request->longitude;

            $hotel = new Hotel();
            $hotel->name = $request->name;
            $hotel->description = $request->description;
            $hotel->telephone = $request->climate;
            $hotel->address = $request->address;
            $hotel->districtid = $districtID;
            $hotel->email = $request->email;
            $hotel->updated_at = Carbon::now();
            $hotel->created_at = Carbon::now();

            $hotelId = DB::table('hotel')->insertGetId(
                [
                    'name' => $hotel->name,
                    'description' => $hotel->description,
                    'telephone'=>$hotel->telephone,
                    'address'=>$hotel->address,
                    'email'=>$hotel->email,
                    'district_id'=>$districtID,
                    'updated_at'=>Carbon::now(),
                    'created_at'=>Carbon::now()
                ]
            );

            DB::update('update hotel set location=POINT(' . $latitude . ',' . $longitude . ') where id=' . $hotelId . ' ');

            return response()->json(
                [
                    'Id'=>$hotelId,
                    'Name' =>  $hotel->name,
                    'Description' =>$hotel->description,
                    'address'=>$hotel->address,
                    'district'=>$hotel->district,
                    'email'=>$request->email,
                    'telephone'=>$request->telephone,
                    'Latitude'=>$latitude,
                    'Longitude'=>$longitude
                ]

            );
        }

    }

    public function remove($id){
        Hotel::destroy($id);
    }

    public function update($id){

    }

    /*
     * Get the all available hotel details.
     * */

    public function findall(){
       $hotel = DB::select('
            SELECT hotel.id,hotel.name,address,x(location) as latitude,
            y(location)as longitude,description,district.name as district,telephone as contact,email
            FROM hotel
            JOIN district ON hotel.districtid=district.id;

        ');

        return response()->json($hotel);
    }

    /*
     * Search hotel by name
     * */
    public function findhotel($name,$token){

        if(User::checkToken($token)) {

            $hotel = DB::select("
            SELECT hotel.id,hotel.name,address,x(location) as latitude,
            y(location) as longitude,description,district.name as district,telephone,email
            FROM hotel
            JOIN district ON hotel.districtid=district.id
            WHERE hotel.name ='" . $name . "' ");

            return response()->json($hotel);

        }
    }

    public function findhoteldistrict($name){
        $district = new District();
        $districtID =  $district->districtId($name);

        $hotel = DB::select('
            SELECT hotel.id,hotel.name,address,x(location) as latitude,
            y(location) as longitude,description,district.name as district,telephone as contact,email
            FROM hotel
            JOIN district ON hotel.districtid=district.id
            WHERE districtid ='.$districtID.'
        ');

        return response()->json($hotel);
    }
}