<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class RegisterController extends Controller
{
    public function index(){
        return view('registration');

    }
    public function createUser(Request $request){
        
        $validated = $request->validate([
            'username' => 'required|string|max:20',
            'email' => 'required|unique:registrations',
            'password' => 'required|alpha-num|min:6',
            'confirmpassword' => 'required|same:password',



        ]);
        // dd($validated);

        //Hashing password
        $validated['password']= Hash::make($validated['password']);

        Register::create($validated);
        return view('login');

    }

    //For Login Form
    public function login(){
        return view('login');
    }

    public function createLogin(Request $request){

         $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string',
        ]);
        
        
        $email = $request->input('email');
        $password = $request->input('password');
        $user = Register::where('email', '=', $email)->first();
        if (!$user) {
           return response('Invalid User');
        }
        if (!Hash::check($password, $user->password)) {
           return response('Password not matched');
        } else{
           $request->session()->put('user',$user->username);

           //update last login status check
           $datas = array("email" => $email, "last_online_at" => Carbon::now());
           DB::table('login_status')->insert($datas);

           return view('home');
        }  
    }
    public function home(){
        return view('home');
    }

  

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect('/login');
       
    }

    public function contactus(){
        return view('contactus');
    }

    

    public function userlist(){
       $users = Register::all();
        return view('userlist',['users'=> $users]);

    }

    public function editUser($id){
        $store = Register::find($id);
  
        return view('editUser', ['store' => $store]);
    }  

    public function update(Request $request,$id){
       $validated = $request->validate([
            'email'=>'required',
            'username'=>'required',
        ]);
        
       Register::find($id)->fill($validated)->save();
       return redirect('userlist');

    }

    public function deleteUser($id){
        Register::find($id)->delete();
        return redirect('userlist');
    }

    public function changepassword($id){
        $key = Register::find($id);
        return view('changepassword',['key'=> $key]);
    }

    function updatepassword(Request $request,$id){
       $validated = $request->validate([
          
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'confirmpassword'=>'required|same:newpassword',
        ]);

        
       
        $password = Register::find($id);  
        // return response($password->password);
        if(!Hash::check($validated['oldpassword'], $password->password))
        {
            return redirect()->back()->with('success', 'Your old password didnot match.');
        }
        else{
            $hashednewpassword = Hash::make($validated['newpassword']);
           $password->update(['password'=> $hashednewpassword]);
            return redirect('/userlist')->with('success','Your password has been changed!!');
            

        }
    


    }
}
