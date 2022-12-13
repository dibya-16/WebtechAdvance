<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\InstructorToken;
use App\Models\Appointment;
use App\Models\InstructorOTP;
use App\Models\Announcement;
use App\Models\Feedback;
use Illuminate\Support\Facades\Validator;
use DateTime;
use App\Mail\InstructorRegistration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str; 


class InstructorController extends Controller
{
    public function registration()
    {
        return view('registration');
    }

    public function registrationSubmit(Request $req)
    {

        $this->validate($req,
        [
            "name"=> "required|regex:/^[A-Za-z- .,]+$/i",
            "password"=>"required|min:4",
            "phoneNo"=>"required",
            "address" =>"required",
            "confirmPassword"=>"required|same:password",
            "email"=>"required"
        ]);

        $instructor= new instructor();
        $instructor->name = $req->name;
        $instructor->email =$req->email;
        $instructor->phoneNo =$req->phoneNo;
        $instructor->address = $req->address;
        $instructor->password =$req->password;
        $instructor->confirmPassword =$req->confirmPassword;
        $instructor->save();

        
       return redirect()->route('instructor.login');
    }

    public function login()
    {
        // session()->flush();
        return view('login');
    }
    
    public function loginSubmit(Request $req)
    {
        $this->validate($req,
        [
            
            "id"=>"required",
            "password"=>"required"
        ]);

        $checkLog=Instructor::where("id", "=", $req->id)->where("password", "=", $req->password)->first();
              
        
        if($checkLog)
        {
              
            
            Session()->put('logged.instructor', $req->id);
           
            

        

             

               
                return redirect()->route('instructor.home');
               
           

        }
        else{

                Session()->flash( "logged.error" , "Invalid id or password!");

                return redirect()->back();

        }
    }

    
    public function home()
    {
        
        $instructorI=Session()->get('logged.instructor');
       $instructorName=Instructor:: Select("name")->where('id','=', $instructorI)->first();
       $instructorName=$instructorName->name;
       return view('home')->with("instructorName",$instructorName);
    }
    public function profile()
    {
        $instructorName=Instructor::Select('name')->where("id","=",Session()->get("logged.instructor"))->first();
        $instructorName=$instructorName->name;
        $instructorEmail=Instructor::Select('email')->where("id","=",Session()->get("logged.instructor"))->first();
        $instructorEmail=$instructorEmail->email;
        $instructorPhoneNo=Instructor::Select("phoneNo")->where("id","=",Session()->get("logged.instructor"))->first();
        $instructorPhoneNo= $instructorPhoneNo->phoneNo;
        $instructorAddress=Instructor::Select("address")->where("id","=",Session()->get("logged.instructor"))->first();
        $instructorAddress= $instructorAddress->address;

        return view('profile')->with("instructorName",$instructorName)->with("instructorEmail",$instructorEmail)->with("instructorPhoneNo",$instructorPhoneNo)->with("instructorAddress",$instructorAddress);
    }
    public function updateProfile()
    {
        $instructorName=Instructor::Select("name")->where("id","=",Session()->get("logged.instructor"))->first();
        $instructorName=$instructorName->name;
        $instructorEmail=Instructor::Select('email')->where("id","=",Session()->get("logged.instructor"))->first();
        $instructorEmail=$instructorEmail->email;
        $instructorPhoneNo=Instructor::Select("phoneNo")->where("id","=",Session()->get("logged.instructor"))->first();
        $instructorPhoneNo= $instructorPhoneNo->phoneNo;
        $instructorAddress=Instructor::Select("address")->where("id","=",Session()->get("logged.instructor"))->first();
        $instructorAddress= $instructorAddress->address;
        $instructorId=Instructor::Select("id")->where("id","=",Session()->get("logged.instructor"))->first();
        $instructorId= $instructorId->id;

        return view('updateProfile')->with("instructorName",$instructorName)->with("instructorEmail",$instructorEmail)->with("instructorPhoneNo",$instructorPhoneNo)->with("instructorAddress",$instructorAddress)->with("instructorId",$instructorId);

    }

    public function updateProfileSubmit(Request $req)
    {
        $this->validate($req,
        [
            "name"=> "required|regex:/^[A-Za-z- .,]+$/i",
            
            "phoneNo"=>"required",
            "address" =>"required",
            
            "email"=>"required"
        ]);

        $instructor= Instructor::find($req->id);
        $instructor->name = $req->name;
        $instructor->email =$req->email;
        $instructor->phoneNo =$req->phoneNo;
        $instructor->address = $req->address;
        $instructor->save();

        
       return redirect()->route('instructor.profile'); 

    }
    public function changePassword()
    {
        $instructorId=Instructor::Select("id")->where("id","=",Session()->get("logged.instructor"))->first();
        $instructorId= $instructorId->id;

        return view('changePassword')->with("instructorId",$instructorId);

        

    }   
    public function changePasswordUpdate(Request $req)
    {
        $this->validate($req,
        [
            
            "password"=>"required|min:4",
            "newPassword"=>"required",
            "confirmPassword"=>"required"

        ]);
        $checkPass=Instructor::where("id", "=",Session()->get("logged.instructor"))->where("password", "=", $req->password)->first();
        if( $checkPass)
        {

            $instructor= Instructor::find($req->id);
            $instructor->password = $req->newPassword;
            $instructor->confirmPassword =$req->confirmPassword;
       
            $instructor->save();

        
           return redirect()->route('instructor.login');

        }

        
    }   
    public function forgotPassword()
    {
       

        return view('forgotPassword');

        

    }   
    public function forgotPasswordUpdate(Request $req)
    {
        $this->validate($req,
        [
            
            "email"=>"required",
            "newPassword"=>"required",
            "confirmPassword"=>"required"

            

        ]);
        $checkEmail=Instructor::where("email", "=", $req->email)->first();
        if($checkEmail)
        {
           

            $instructor=Instructor::find($req->email)->first();
            $instructor->password = $req->newPassword;
            $instructor->confirmPassword =$req->confirmPassword;
            
       
            $instructor->save();

        
           return redirect()->route('instructor.login');

        }

        
    }   

     public function appointments(){

        
        $appointments=Appointment::where('InstructorId', '=', Session()->get('logged.instructor'))->get();
       // $instructorId=Instructor::Select("id")->where("email","=",Session()->get("logged.instructor"))->first();
       //$i_id=session()->get('logged.instructor.id');
      // $appointments=Appointment::where("InstructorId",$i_id)->get();
        return view('appointments')->with('appointments', $appointments);
       

       

       

     }
     public function appointmentStatusAccept($id){
        $appointment=Appointment::find($id);
        $appointment->status ="Accept";
        $appointment->save();
        return redirect()->back();
     
    
    }
    public function appointmentStatusCancel($id){
        $appointment=Appointment::find($id);
        $appointment->status ="Cancel";
        $appointment->save();
        return redirect()->back();
     
    
    }
    public function appointmentStatusPending($id){
        $appointment=Appointment::find($id);
        $appointment->status ="Pending";
        $appointment->save();
        return redirect()->back();
     
    
    }


     
     public function session_Schedules(){

        
        
        $appointments=Appointment::where('InstructorId', '=', Session()->get('logged.instructor'))->where('status', '=', "Accept")->get();
       // $instructorId=Instructor::Select("id")->where("email","=",Session()->get("logged.instructor"))->first();
       //$i_id=session()->get('logged.instructor.id');
      // $appointments=Appointment::where("InstructorId",$i_id)->get();
        return view('session_Schedules')->with('appointments', $appointments);
       

       

       

     }



     public function announcement(){

        return view('announcement');

     }
     public function announcementPublish(Request $req)
     {
         $this->validate($req,
         [
                      
             "announcement"=>"required"
             
         ]);
 
         $announcement=new Announcement();
         $announcement->announcement = $req->announcement;
         
         $announcement->save();
 
         
        return redirect()->route('instructor.announcement'); 
 
     }

     public function feedback(){

        return view('feedback');

     }
     public function feedbackSend(Request $req)
     {
         $this->validate($req,
         [

            "clientId"=>"required",
            "clientName"=>"required",                      
             "feedback"=>"required"
             
         ]);
 
         $feed=new Feedback();
         $feed->clientId = $req->clientId;
         $feed->clientName = $req->clientName;
         $feed->feedback = $req->feedback;
         
         $feed->save();
 
         
        return redirect()->route('instructor.feedback'); 
 
     }

     public function logout()
    {
        session()->forget("logged.instructor");
        //carts::truncate();
        session()->flash('msg','Sucessfully Logged Out');
        return redirect()->route('instructor.login');
    }

    //API

    public function InstructorRegisterAPI(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "name"=> "required|regex:/^[A-Za-z- .,]+$/i",
            "password"=>"required|min:4",
            "phoneNo"=>"required",
            "address" =>"required",
            "confirmPassword"=>"required|same:password",
            "email"=>"required"
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        

        $code = Str::random(6);

        $instructorOTP= new InstructorOTP();
        $instructorOTP->name = $req->name;
        $instructorOTP->email =$req->email;
        $instructorOTP->phoneNo =$req->phoneNo;
        $instructorOTP->address = $req->address;
        $instructorOTP->password =$req->password;
        $instructorOTP->confirmPassword =$req->confirmPassword;
        $instructorOTP->otp =$code;
        $instructorOTP->save();

        $this->sendMail($req->email, $code);

        return response()->json(["message" => "Instructor OTP Send"], 200);

    }

    public function InstructorRegisterOTPAPI(Request $req)
    {
        $code = InstructorOTP::select('otp')->where('email', '=', $req->email)->orderBy('id', 'desc')->get();
        $code = $code[0]->otp;
        if($req->otp == $code)
        {
            $name = InstructorOTP::select('name')->where('email', '=', $req->email)->get();
            $name = $name[0]->name;
            $address = InstructorOTP::select('address')->where('email', '=', $req->email)->get();
            $address = $address[0]->address;
            $password = InstructorOTP::select('password')->where('email', '=', $req->email)->get();
            $password = $password[0]->password;
            $phone = InstructorOTP::select('phoneNo')->where('email', '=', $req->email)->get();
            $phone = $phone[0]->phoneNo;
            $confirmPassword = InstructorOTP::select('confirmPassword')->where('email', '=', $req->email)->get();
            $confirmPassword = $confirmPassword[0]->confirmPassword;

            $instructor= new instructor();
            $instructor->name = $name;
            $instructor->email =$req->email;
            $instructor->phoneNo =$phone;
            $instructor->address = $address;
            $instructor->password =$password;
            $instructor->confirmPassword =$confirmPassword;
            $instructor->save();

            $res=InstructorOTP::where('email',$req->email)->delete();
            return response()->json(['message' => 'success'], 200);
        } 
        else
        {
            // session()->flash('invalid-confirmation', 'Invalid confirmation code.');
            return response()->json(['message' => 'failed'], 422);
        }
    }

    public function InstructorDashboardAPI(Request $request)
    {
        $token = $request->header('Authorization');
        $instructorToken = InstructorToken::where('token', '=', $token)->get();
        if(count($instructorToken) == 0)
        {
            return response()->json(['message' => 'failed'], 422);
        }
        else
        {
            $instructor = Instructor::where('id', '=', $instructorToken[0]->instructor_id)->get();
            return response()->json(['instructor' => $instructor[0]], 200);
        }
    }

    public function InstructorProfileAPI(Request $request)
    {
        $token = $request->header('Authorization');
        $instructorToken = InstructorToken::where('token', '=', $token)->get();
        if(count($instructorToken) == 0)
        {
            return response()->json(['message' => 'failed'], 422);
        }
        else
        {
            $instructor = Instructor::where('id', '=', $instructorToken[0]->instructor_id)->get();
            return response()->json(['instructor' => $instructor[0]], 200);
        }
    }

    public function InstructorProfileUpdateAPI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"=> "required|regex:/^[A-Za-z- .,]+$/i",
            "phoneNo"=>"required",
            "address" =>"required",
            "email"=>"required"
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        else
        {
            $token = $request->header('Authorization');
            $instructorToken = InstructorToken::where('token', '=', $token)->get();
            if(count($instructorToken) == 0)
            {
                return response()->json(['message' => 'failed'], 422);
            }
            else
            {
                $instructor = Instructor::where('id', '=', $instructorToken[0]->instructor_id)->get();
                $instructor = $instructor[0];
                $instructor->name = $request->name;
                $instructor->phoneNo = $request->phoneNo;
                $instructor->email = $request->email;
                $instructor->address = $request->address;
                $instructor->save();
                return response()->json(['message' => 'success'], 200);
            }
        }
    }
    public function InstructorChangePassword(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "password"=>"required|min:4",
            "newPassword"=>"required",
            "confirmPassword"=>"required"
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        else
        {
            $token = $req->header('Authorization');
            $instructorToken = InstructorToken::where('token', '=', $token)->get();
            if(count($instructorToken) == 0)
            {
                return response()->json(['message' => 'failed'], 422);
            }
            else
            {
                $checkPass=Instructor::where('id', '=', $instructorToken[0]->instructor_id)->where("password", "=", $req->password)->get();
                if( $checkPass)
                {

                $instructor = Instructor::where('id', '=', $instructorToken[0]->instructor_id)->get();
                $instructor = $instructor[0];
                $instructor->password = $req->newPassword;
                $instructor->confirmPassword =$req->confirmPassword;
       
                $instructor->save();

        
                 return response()->json(['message' => 'success'], 200);

                }
            }
        }
       
        

        
    }   
    public function InstructorAppointments(Request $request)
    {

        $token = $request->header('Authorization');
        $instructorToken = InstructorToken::where('token', '=', $token)->get();
        if(count($instructorToken) == 0)
        {
            return response()->json(['message' => 'failed'], 422);
        }
        else
        {
            $appointments = Appointment::where('InstructorId', '=', $instructorToken[0]->instructor_id)->get();
            return response()->json(['appointments' => $appointments], 200);
        }


    } 

    public function InstructorAppointmentsAccept($id, Request $request)
    {
        $token = $request->header('Authorization');
        $instructorToken = InstructorToken::where('token', '=', $token)->get();
        if(count($instructorToken) == 0)
        {
            return response()->json(['message' => 'failed'], 422);
        }
        else
        {
            $appointment=Appointment::find($id);
            $appointment->status ="Accept";
            $appointment->save();
            return response()->json(['message' => "Accepted"], 200);
        }

    }
    public function InstructorAppointmentsCancel($id, Request $request)
    {
        $token = $request->header('Authorization');
        $instructorToken = InstructorToken::where('token', '=', $token)->get();
        if(count($instructorToken) == 0)
        {
            return response()->json(['message' => 'failed'], 422);
        }
        else
        {
            $appointment=Appointment::find($id);
            $appointment->status ="Cancel";
            $appointment->save();
            return response()->json(['message' => "Canceled"], 200);
        }

    }
    public function InstructorAppointmentsPending($id, Request $request)
    {
        $token = $request->header('Authorization');
        $instructorToken = InstructorToken::where('token', '=', $token)->get();
        if(count($instructorToken) == 0)
        {
            return response()->json(['message' => 'failed'], 422);
        }
        else
        {
            $appointment=Appointment::find($id);
            $appointment->status ="Pending";
            $appointment->save();
            return response()->json(['message' => "Pending"], 200);
        }

    }
    public function InstructorSessionSchedule(Request  $request){

        $token = $request->header('Authorization');
        $instructorToken = InstructorToken::where('token', '=', $token)->get();
        if(count($instructorToken) == 0)
        {
            return response()->json(['message' => 'failed'], 422);
        }
        else
        {
            $appointments = Appointment::where('InstructorId', '=', $instructorToken[0]->instructor_id)->where('status', '=', "Accept")->get();
            return response()->json(['appointments' => $appointments], 200);
        }

    }

    public function InstructorAnnouncement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "announcement"=>"required"
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $announcement= new Announcement();
        $announcement->announcement =$request->announcement;
        
        $announcement->save();

       

        return response()->json(["message" => "Announcement Published"], 200);


    }
    public function InstructorFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "clientId"=>"required",
            "clientName"=>"required",                      
             "feedback"=>"required"
             
         
 
        
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $feedback=new Feedback();
        $feedback->clientId = $request->clientId;
        $feedback->clientName = $request->clientName;
        $feedback->feedback = $request->feedback;
        
        $feedback->save();

       

        return response()->json(["message" => "Feedback done"], 200);


    }
    public function InstructorLogoutAPI(Request $request)
    {
        $token = $request->header('Authorization');
        $instructorToken = InstructorToken::where('token', '=', $token)->get();
        if(count($instructorToken) == 0)
        {
            return response()->json(['message' => 'failed'], 422);
        }
        else
        {
            $instructorToken = $instructorToken[0];
            $instructorToken->expires_at = new DateTime();
            $instructorToken->save();

            return response()->json(['message' => 'success'], 200);
        }
    }

    public function sendMail($email, $code)
    {
        // $email = "asifkamaltias@gmail.com";
        // $code = Str::random(6);
        $details = [
            'code' => $code,
            'title' => 'Instructor Registration'
        ];
        Mail::to($email)->send(new InstructorRegistration($details));
    }
       
}
