<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\User;

use App\Models\DoorCommand;
use Hash;

use Session;
use Carbon\Carbon;

class CustomAuthController extends Controller
{



    public function login(){
        return view("auth.login");
    }

    public function home(){
        // $testimonial = Testimonials::where("status","approved")->orderBy("id","DESC")->get();
        $testimonial = "";
        return view("frontend.index",compact("testimonial"));
    }
    

    public function admin(){
        $join_time = Carbon::now();
        
        DoorCommand::where("id",1)->update([
                      
            'command' => "close door",
            'old_command' => "close door",
            'admin_join_time'=>$join_time,
            'num_trial' => 0,
            'admin' => "active",
        ]);

        return view("admin.index");
    }

    
    public function updateCommands(Request $request){
      
       
        $validator = Validator::make($request->all(),[
    			
           
            "command"=>"required",
           

        ],
        [
         
          "command.required"=>"invalid",
         
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $existingCommands = DoorCommand::where("id",1)->first();
            $num_trial = $existingCommands->num_trial;
            $command = trim($request->command);
            
            if($command == $existingCommands->password){
                $num_trial = 0;
            }else if($command == $existingCommands->old_command){
                $num_trial = $existingCommands->num_trial;
            }else{
                $num_trial = $num_trial+1;
            }

            $sendData =  DoorCommand::where("id",1)->update([
                      
                'command' => $command,
                'num_trial' => $num_trial,
            ]);
    

             
               
            if($sendData){
                $newCommands = DoorCommand::where("id",1)->first();
               return response()->json([
                   'status'=>200,
                   'command'=>$newCommands,
                   'message'=>"done",
               ]);

            
            }else{
                return response()->json([
                    'status'=>400,
                    'error'=>"sorry!! something went wrong",
                ]);
            }
                
            
   
        }

    }

    public function getCommands(Request $request){
      
       
        $validator = Validator::make($request->all(),[
    			
           
            "request"=>"required",
           

        ],
        [
         
          "request.required"=>"invalid",
         
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $existingCommands = DoorCommand::where("id",1)->first();
         
            
            if(!($existingCommands->command == $existingCommands->old_command)){
                DoorCommand::where("id",1)->update([
                      
                    'old_command' => $existingCommands->command,
                ]);

            }

    

             
               
            if($existingCommands){
                $updated_at = Carbon::parse($existingCommands->updated_at)->format("H:iA - d F Y");
               return response()->json([
                   'status'=>200,
                   'command'=>$existingCommands,
                   'updated_at'=> $updated_at,
                   'message'=>"done",
               ]);

            
            }else{
                return response()->json([
                    'status'=>400,
                    'error'=>"sorry!! something went wrong",
                ]);
            }
                
            
   
        }

    }
    
    
    
    public function MainUserLogout(){
        if(Session::has("mainUserIsLogedIn")){
            Session()->pull("mainUserIsLogedIn");
        }
        return redirect()->route('home.index');
    }
}