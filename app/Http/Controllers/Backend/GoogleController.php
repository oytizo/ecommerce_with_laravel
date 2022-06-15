<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\category;
use App\Models\Backend\Items;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
   public function redirectToGoole(){
     return Socialite::driver('google')->redirect();
   }

   public function handleGoogleCallback(){
       try{

           $user=Socialite::driver('google')->user();
           $finduser=User::where('google_id',$user->id)->first();
           
           if($finduser){
       
            Auth::login($finduser);
            
            $items=Items::all();
            $categories=category::all();
            return view('frontend/master_template/master_template',compact('items','categories'));

            //return redirect()->route('frontend');
  
            
   
        }else{

            return view('backend.newpassword',compact('user'));

        //     $newUser = User::create([
        //         'fname'=>$user->name,
        //         'name' => $user->name,
        //         'email' => $user->email,
        //         'role'=> 3,
        //         'google_id'=> $user->id,
        //         'password' => Hash:: make('password')
        //     ]);
  
        //     Auth::login($newUser);
  
        //     return redirect()->route('frontend');
         }

       }
       catch(Exception $e){
        dd($e->getMessage());
       }
   }

   public function passwordsubmit(Request $res){
    try{

        if($res->password==$res->cpassword){
            
                $newUser = User::create([
                    'fname'=>$res->fname,
                    'name' => $res->name,
                    'email' => $res->email,
                    'role'=> 3,
                    'google_id'=> $res->user_id,
                    'password' => Hash:: make($res->password)
                ]);
       
                Auth::login($newUser);
                
                $items=Items::all();
                $categories=category::all();
                return view('frontend/master_template/master_template',compact('items','categories'));
       
               // return redirect()->route('frontend');
        }
else{
    return redirect()->route('newpassword');

}
      
        
    //     if($finduser){
    
    //      Auth::login($finduser);

    //      return redirect()->route('frontend');

    //  }else{

    
    //   }

    }
    catch(Exception $e){
     dd($e->getMessage());
    }
}
}
