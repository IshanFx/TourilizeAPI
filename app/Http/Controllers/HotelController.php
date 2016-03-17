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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'district' => 'required',
                'name' => 'required',
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
            y(location)as longitude,description,district.name as district,telephone as contact
            FROM hotel
            JOIN district ON hotel.districtid=district.id;

        ');
        return json_encode($hotel);
    }

    /*
     * Search hotel by name
     * */
    public function findhotel($name){
        $hotel = DB::select('
            SELECT hotel.id,hotel.name,address,x(location),y(location),description,district.name as district,telephone
            FROM hotel
            JOIN district ON hotel.districtid=district.id;
            WHERE name ="'.$name.'"
        ');

        return json_encode($hotel);
    }

    public function findhoteldistrict($name){
        $district = new District();
        $districtID =  $district->districtId($name);

        $hotel = DB::select('
            SELECT hotel.id,hotel.name,address,x(location) as latitude,
            y(location) as longitude,description,district.name as district,telephone as contact
            FROM hotel
            JOIN district ON hotel.districtid=district.id
            WHERE districtid ='.$districtID.'
        ');

        return json_encode($hotel);
    }
}