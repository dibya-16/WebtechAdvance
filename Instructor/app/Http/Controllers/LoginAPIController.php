<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\InstructorToken;
use Illuminate\Support\Str;
use DateTime;
use Illuminate\Support\Facades\Validator;

class LoginAPIController extends Controller
{
    //
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ],
        [
            'email.required' => 'Please enter your email',
            'email.email' => 'Email must be a valid email',
            'password.required' => 'Please enter your password'
            
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        else
        {
            $instructor = Instructor::where('email', '=', $request->email)->get();
            if(count($instructor) == 0)
            {
                return response()->json(['message' => 'failed'], 422);
            }
            else
            {
                $instructor = $instructor[0];
                if($request->password == $instructor->password)
                {
                    $key = Str::random(32);

                    $instructorToken = new InstructorToken();
                    $instructorToken->instructor_id = $instructor->id;
                    $instructorToken->token = $key;
                    $instructorToken->created_at = new DateTime();
                    $instructorToken->save();
                    return response()->json(['message' => 'success', 'token' => $key], 200);
                }
                else
                {
                    return response()->json(['message' => 'Invalid email or password!'], 422);
                }
            }
        }


    }
    public function  logout(Request $req){

        $token = Token::where('token',$req->token)->first();
        if($token){
            $token->expired_at =new DateTime();
            $token->save();
            return $token;
        }

    }


} 
