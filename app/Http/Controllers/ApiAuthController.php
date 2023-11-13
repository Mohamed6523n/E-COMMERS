<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{

    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            "name"=>"required|string|max:255",
            "email"=>"required|email|max:255",
            "password"=>"required|min:8|confirmed"
        ]);

        if($validator->fails()){
            return response()->json([
                "error"=> $validator->errors()
            ],302);
        }
        // hashed

        $password = bcrypt( $request->password);

        // create
        $access_token =Str::random(70);

        User::create([
            "name"=> $request->name,
            "email" => $request->email,
            "password"=>$password,
            "access_token"=> $access_token
        ]);

        return response()->json([
            "success"=> "registered successfuly",
            "access_token" => $access_token
        ],201);

    }

     public function login(Request $request){
        $validator = Validator::make($request->all(),[
            "email"=>"required|email|max:255",
            "password"=>"required|min:8"
        ]);

        if($validator->fails()){

            return response()->json([
                "errors"=>$validator->errors()
            ],300);
        }

            $user = User::where("email","=",$request->email)->first();

            if($user !== null){
            $oldPassword = $user->password ;
            $access_token = Str::random(64);
            $isVerified = Hash::check($request->password , $oldPassword );

            if($isVerified){
                $user->update([
                    "access_token"=> $access_token
                ]);
                return response()->json([
                    "msg"=>"loged succesfuly ",
                    "access_token"=>$access_token
                ],201);
            }else{
                return response()->json([
                    "msg"=>"not successfuly"
                ],312);
            }


            }else{
                return response()->json([
                    "errors"=>"this account is not found "
                ],312);
            }


     }

     public function logout(Request $request){

        $access_token = $request->header("access_token");

        if($access_token !== null){


            $user = User::where("access_token","=",$access_token)->first();
            if($user !== null){

                $user->update([
                    "access_token"=> null
                ]);

                return response()->json([
                    "msg"=>"loged out successsfuly "
                ],200);


            }else{
                return response()->json([
                    "msg"=>"access token not correct"
                ],404);
            }


        }else{
            return response()->json([
                "msg"=>"access token not found"
            ],404);
        }

     }
}
