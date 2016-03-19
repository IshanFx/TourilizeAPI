<?php
/**
 * Created by PhpStorm.
 * User: IshanFx
 * Date: 3/14/2016
 * Time: 12:56 PM
 */

namespace App\Http\Controllers;


use App\Category;
use App\Guider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuiderController extends Controller
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
            $guider = new Guider();
            $guider->firstname = $request->firstname;
            $guider->lastname = $request->lastname;
            $guider->telephone = $request->telephone;
            $guider->nic = $request->nic;
            $guider->address = $request->address;
            $guider->email = $request->email;
            $guider->category = $request->category;
            $guider->language = $request->language;

            return response()->json([

            ]);
        }

    }

    public function remove($id){
        Guider::destroy($id);

    }

    public function update($id){

    }

    public function findguider($name){
        $guider = DB::select("
            SELECT guider.id,firstname,lastname,telephone as contact, nic , address,email
            FROM guider
            JOIN category ON guider.category_id=category.id
            WHERE firstname = '".$name."' ");

        return response()->json($guider);
    }

    public function findguiderbycategory($name){
        $category = new Category();
        $categoryID = $category->categoryId($name);

        $guider = DB::select('
            SELECT guider.id,firstname,lastname,telephone as contact, nic , address,email
            FROM guider
            JOIN category ON guider.category_id=category.id
            WHERE category_id='.$categoryID.'
        ');

        return response()->json($guider);
    }

    public function findall(){
        $guider = DB::select('
            SELECT guider.id,firstname,lastname,telephone as contact, nic , address,email
            FROM guider
            JOIN category ON guider.category_id=category.id
        ');
        return response()->json($guider);
    }

}