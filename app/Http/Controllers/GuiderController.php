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
use Illuminate\Support\Facades\Validator;

class GuiderController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'category' => 'required',
                'firstname' => 'required',
                'lastname'=>'required',

            ]
        );

        if ($validator->fails()) {
            return json_encode(
                [
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
            $guider->save();
            return response()->json(
                [
                'id'=>$guider->ID,
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'telephone'=>$request->telephone,
                'nic'=>$request->nic,
                'address'=>$request->address,
                'email'=>$request->email,
                'category'=> $request->category
            ]
            );
        }

    }

    public function remove($id){
        $guider =  Guider::find($id);
        $guider->delete();

        return response()->json(
            [
            'id'=>$guider->ID,
            'firstname'=>$guider->firstname,
            'lastname'=>$guider->lastname,
            'telephone'=>$guider->telephone,
            'nic'=>$guider->nic,
            'address'=>$guider->address,
            'email'=>$guider->email,
            'category'=> $guider->category
        ]
        );

    }

    public function update(Request $request, $id){

        $guider = Guider::find($id);

        $guider->address = $request->address;
        $guider->telephone = $request->telephone;
        $guider->email = $request->email;
        $guider->category = $request->category;
        $guider->save();

        return response()->json(
            [
                'id'=>$id,
                'category'=>$guider->category,
                'address'=>$guider->address,
                'telephone'=>$guider->telephone,
                'email'=>$guider->email
            ]
        );

    }

    public function findguider($name){
        $guider = Guider::where('firstname',$name)->first();
        return response()->json($guider);
    }

    public function findguiderbycategory($name){

        $guider = Guider::where('category',$name)->get();
        return response()->json($guider);
    }

    public function findall(){
        $guider  = Guider::all();
        return response()->json($guider);
    }

}