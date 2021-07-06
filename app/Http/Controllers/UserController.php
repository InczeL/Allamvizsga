<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Image;
use File;

class UserController extends Controller
{
    
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function Profile(){
        return view('profile');
    }
    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
    public function create(Request $request){
        $request->validate([
            'user_name' =>'required|min:5|max:30|unique:users',
            'password' =>'required|confirmed|min:6|max:20',
            'email' =>'required|email|unique:users'
        ]);
        $User = new User;
        $User->user_name =$request->user_name;
        $User->password = Hash::make($request->password);
        $User->email= $request->email;
        $User->class = $request->class;
        $User->role= $request->role;
        $User->profile_img ="default.jpg";
        $query = $User->save();

        if($query){
            return redirect('login');
        }
        else{
            return back();
        }
    }
    public function check(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' => 'required|min:6|max:20'
        ]);

        $userInfo = User::where('email','=',$request->email)->first();

        if(!$userInfo){
            return back()->with('fail',' Érvénytelenen email cím! ');
        }
        else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('LoggedUser',$userInfo);
                return redirect('/');
            }
            else{
                return back()->with('fail',' Helytelen jelszó! ');
            }
        }
    }
    public function updateAvatar(Request $request){

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save('avatars/' . $filename);

            $user = User::where('id',session()->get('LoggedUser')->id)->first();
            if($user->profile_img !='default.jpg'){
                $dir= 'avatars/'. $user->profile_img;
                File::delete($dir );
            }
            $user-> profile_img = $filename;
            $user->save();
            session()->forget('LoggedUser');
            session()->put('LoggedUser',$user);
        
            return view('profile');
        }
        else{
            return back();
        }
    }

}
