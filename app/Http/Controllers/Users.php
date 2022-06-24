<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Blog;
use Str;
use Illuminate\Support\Facades\Hash;
class Users extends Controller
{
    public function index()
    {
        return view('front');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'dob' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'role' => 'required',

        ]);
        $img = $request->file('image')->getclientoriginalName();
        $store = $request->file('image')->storeAS('user-images',$img);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dob = $request->dob;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->image = $img;
        $user->role = $request->role;
        $success = $user->save();
        if($success){
            return redirect('login');
        }
    }

    public function login()
    {
        return view('login');
    }
    public function userLogin(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        
        ]);

        $email = $request->email;
        $password = $request->password;

       $user =User::where('email',$email)->where('password',$password)->first();
       if(!empty($user)){
  
            $array = array('user_id'=>$user->id,'role'=>$user->role);
            $request->session()->put($array);
            return redirect('dashboard');
        }else{
            return redirect('login');

        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function blogInsert(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'status' => 'required',
        
        ]);
        $user_id = session('user_id');
        $img = time().'-'.Str::of(md5(time() . $request->file('image')->getclientOriginalName()))->substr(0,50).'.'.
        $request->file('image')->extension();
        $store = $request->file('image')->storeAS('blog-images',$img);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->start_date = $request->start_date;
        $blog->end_date = $request->end_date;
        $blog->image = $img;
        $blog->status = $request->status;
        $blog->user_id = $user_id;

        $success = $blog->save();
        if($success){
            return redirect('dashboard');
        }
    }
    function blogsList(){
        $role = session('role');
        if($role == 'admin'){
           $blogs['all_data'] =  Blog::get();
        }else{
            $user_id = session('user_id');

            $blogs['all_data'] =Blog::where('user_id',$user_id)->get();
        }
        return view('blogList',$blogs);
    }

    public function blogEdit($id)
    {
        $blogs['single_data'] =Blog::where('id',$id)->first();
        return view('blogEdit',$blogs);

    }

    public function blogUpdate(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
            'status' => 'required',
        ]);
        if($request->file('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png',
            ]);
        }
        if($request->file('image')){
            $img = time().'-'.Str::of(md5(time() . $request->file('image')->getclientOriginalName()))->substr(0,50).'.'.
            $request->file('image')->extension();
            $store = $request->file('image')->storeAS('blog-images',$img);
            $array = array(
                'title' => $request->title,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'image' => $img,
                'status' => $request->status,
            );       
        }else{
            $array = array(
                'title' => $request->title,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
            ); 
        }
        $update =Blog::where('id',$id)->update($array);
        if($update){
            return redirect('blog-list');
        }
    }


    public function blogDelete($id)
    {
       $delete = Blog::where('id',$id)->delete();
       if($delete){
        return redirect('blog-list');
       }
    }

    public function allBlogs()
    {
        $blogs['all_data'] =Blog::where('status','active')->get();
        $blogs['front'] = 'all_users';
        return view('frontend_blog',$blogs);
        
    }
}
