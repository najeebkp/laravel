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
		$post->category_id=$request['category'];
		$string=$request['title'];
		$dummy=substr($string,0,5);
		$post->slug=str_replace(' ', '', $dummy);
		$user_id=Auth::user()->id;
		$post->user_id=$user_id;
		$post->save();
		return redirect()->route('home');
	}
	public function create()
	{
		return view('html\new_post');
	}
	public function show()
	{
		$user_id=Auth::user()->id;
		$users=User::find($user_id);
		$category=$users->category;
		$category = explode(',', $category);
		$length=count($category);
		if ($length==2){
		$posts=Post::whereIn('category_id',[$category[0],$category[1]])->get();
		return view('html\posts',['posts'=>$posts]);
		}
		elseif ($length==3){
		$posts=Post::whereIn('category_id',[$category[0],$category[1],$category[2]])->get();
		return view('html\posts',['posts'=>$posts]);
		}
		elseif ($length==4){
			$posts=Post::whereIn('category_id',[$category[0],$category[1],$category[2],$category[3]])->get();
		return view('html\posts',['posts'=>$posts]);
		}
		else{
			$posts=Post::whereIn('category_id',$category)->get();
		return view('html\posts',['posts'=>$posts]);
		}
	}
	public function details($slug)
	{
		$posts=Post::where('slug',$slug)->first();
		return view('html\post_details',['posts'=>$posts]) ;
	}
	public function category($category)
	{
		$posts=Post::where('category_id',$category)->get();
		return view('html\posts',['posts'=>$posts]) ;
	}
	public function mypost()
	{	
		$user_id=Auth::user()->id;
		$posts=Post::where('user_id',$user_id)->get();
		return view('html\post_list_admin',['posts'=>$posts]) ;
	}
	public function edit($slug)
	{
		$posts=Post::where('slug',$slug)->first();
		return view('html\edit',['posts'=>$posts]);
	}
	public function update(Request $request,$slug)
	{
		Post::where('slug',$slug)->update(['title'=>$request['title'],'body'=>$request['body'],'category_id'=>$request['category']]);
		return redirect()->route('home');
	}
	public function delete($slug)
	{
		$delete=Post::where('slug',$slug)->delete();
		return redirect()->route('postlist');
	}
	public function showChangePasswordForm($id)
	{
		$users=User::where('id',$id)->first();
		return view('auth.changepassword',['users'=>$users]);
    }
    public function changepass(Request $request,$id)
	{
		$users=User::where('id',$id)->first();
		$oldpassword=$users->password;
		$oldpassword1=$request['password1'];
		$newpassword1=$request['password2'];
		$cryptnewpass=bcrypt($newpassword1);
		$newpassword2=$request['password3'];
		
		if(password_verify($oldpassword1,$oldpassword) && $newpassword1==$newpassword2){
			$users=User::where('id',$id)->update(['password'=>$cryptnewpass]);
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