<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use DB;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function postCreatePost(Request $request)
	{
		$post=new Post();
		$post->title=$request['title'];
		$post->body=$request['body'];
		$post->Category=$request['Category'];
		$string=$request['title'];
		$dummy=substr($string,0,5);
		$post->slug=str_replace(' ', '', $dummy);

		$request->user()->posts()->save($post);
		return redirect()->route('home');
	}
	public function create()
	{
		return view('new_post');
	}
	public function show()
	{
		$me=Auth::user()->id;
		$users=DB::table('users')->where('id',$me)->first();
		$caty=$users->cat;
		$caty = explode(',', $caty);
		$len=count($caty);
		
		


		if ($len==2){

		$posts=DB::table('posts')->whereIn('Category',[$caty[0],$caty[1]])->get();
		
		return view('hi',['posts'=>$posts]);
		}

		elseif ($len==3){

		$posts=DB::table('posts')->whereIn('Category',[$caty[0],$caty[1],$caty[2]])->get();
		return view('hi',['posts'=>$posts]);
			

		// $posts=DB::table('posts')->where('Category',print_r($one))->get();
			

		}
		elseif ($len==4){
			$posts=DB::table('posts')->whereIn('Category',[$caty[0],$caty[1],$caty[2],$caty[3]])->get();
		return view('hi',['posts'=>$posts]);

		}
		else{
			$posts=DB::table('posts')->whereIn('Category',$caty)->get();
		return view('hi',['posts'=>$posts]);
		}

		
		
	}
	public function details($slug)
	{
		$posts=DB::table('posts')->where('slug',$slug)->first();
		return view('post_details',['posts'=>$posts]) ;
	}
	public function category($category)
	{
		$posts=DB::table('posts')->where('Category',$category)->get();
		return view('hi',['posts'=>$posts]) ;
	}
	public function mypost()
	{	
		$user_id=Auth::user()->id;
		$posts=DB::table('posts')->where('user_id',$user_id)->get();
		return view('post_list_admin',['posts'=>$posts]) ;
	}
	public function edit($slug)
	{
		$posts=DB::table('posts')->where('slug',$slug)->first();
		return view('edit',['posts'=>$posts]);
	}
	public function update(Request $request,$slug)
	{

		// $post=DB::table('posts')->where('slug',$slug)->get();
		
		$delete=DB::table('posts')->where('slug',$slug)->delete();
		// $delete->delete();
		// $post= DB::table('posts')->where('slug',$slug)->get();

		$post=new Post();
		$post->title=$request['title'];
		$post->body=$request['body'];
		$post->Category=$request['Category'];
		$string=$request['title'];
		$dummy=substr($string,0,5);
		$post->slug=str_replace(' ', '', $dummy);

		$request->user()->posts()->save($post);
		return redirect()->route('home');
		
	}
	public function delete($slug)
	{
		$delete=DB::table('posts')->where('slug',$slug)->delete();
		return redirect()->route('postlist');
	}
	public function showChangePasswordForm($id)
	{
		$users=DB::table('users')->where('id',$id)->first();
		return view('auth.changepassword',['users'=>$users]);
    }
    public function changepass(Request $request,$id)
	{

		$users=DB::table('users')->where('id',$id)->first();

		$oldpassword=$users->password;
		$oldemail=$users->email;
		$olduserid=$users->id;
		$oldusername=$users->name;
		$oldcat=$users->cat;
		$oldpassword1=$request['password1'];
		$newpassword1=$request['password2'];
		$cryptnewpass=bcrypt($newpassword1);
		$newpassword2=$request['password3'];
		
		if(password_verify($oldpassword1,$oldpassword) && $newpassword1==$newpassword2){
			$users=DB::table('users')->where('id',$id)->first();
			$users=DB::table('users')->where('id',$id)->delete();
			$users=new User();
			$users->cat=$oldcat;
			$users->password=$cryptnewpass;
			$users->email=$oldemail;
			$users->name=$oldusername;
			$users->id=$olduserid;

			$users->save();

			
			return redirect()->route('home')->withSuccess(['your password changed successfully!!']);

		}
		elseif(password_verify($oldpassword1,$oldpassword)&&$newpassword1!=$newpassword2){

			
			return redirect()->back()->withSuccess(['new passwords not matching']);
		}
		else{

			return redirect()->back()->withSuccess(['you are given wrong current password']);
		}

    }

}