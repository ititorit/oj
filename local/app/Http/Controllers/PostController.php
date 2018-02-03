<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\category;
use App\chude;
use App\User;
use Validator;
use Auth;

class PostController extends Controller
{
	public function __construct() {
		$cate = category::all();
		$chude= chude::all();
        $newPost = posts::orderBy('id', 'DESC')->limit(10)->get();
        $post = posts::orderBy('id', 'DESC')->paginate(5);
        $numPost = posts::select('id')->get();
        $numUser = User::select('id')->get();
        $numChuDe= chude::select('id')->get();
        view()->share('cate', $cate);
        view()->share('numUser', $numUser);
        view()->share('numPost', $numPost);
        view()->share('numChuDe', $numChuDe);
		view()->share('chude', $chude);
        view()->share('newPost', $newPost);
        view()->share('post', $post);
	}
	public function getListPost() {
		$post = posts::orderBy('id', 'DESC')->paginate(10);
		return view('admin.post.list', ['post' => $post]);
	}
	public function getListPostAjax() {
		$post = posts::orderBy('id', 'DESC')->paginate(10);
		return view('admin.post.listAjax', ['post' => $post]);
	}

	// Add post.
    public function getAddPost() {
    	return view('admin.post.add');
    }
    public function postAddPost(Request $req) {
    	$rules = [
    		'name_add' => 'required|min:10',
    		'intro_add'=> 'required',
    		'full_add' => 'required'
    	];
    	$mess = [
    		'name_add.required' => 'Bạn chưa nhập tiêu đề cho bài viết',
    		'name_add.min' => 'Tiêu đề tối thiếu phải chứa 10 ký tự',
    		'intro_add.required' => 'Bạn chưa nhập tóm tắt của bài viết',
    		'full_add.required' => 'Bạn chưa nhập nội dung của bài viết',
    	];
    	$validator = Validator::make($req->all(), $rules, $mess);
    	if($validator->fails()) {
    		return redirect()->back()->withInput()->withErrors($validator);
    	} else {
            $__name = str_slug($req['name_add']);
            $check = posts::where('name_without_accent', $__name)->first();
            if($check) {
                return redirect()->back()->withInput()->with(['danger' => 'Tên bài đã trùng hoặc giống với một bài viết. Vui lòng kiểm tra lại.']);
            }
    		$post = new posts;

    		$post->title = $req['name_add'];
    		$post->name_without_accent = str_slug($req['name_add']);
    		$post->intro = $req['intro_add'];
    		$post->full = $req['full_add'];
    		$post->idUser = Auth::user()->id;
    		$post->idCate = $req['cate_add'];
    		$post->idChuDe = $req['chude_add'];

    		$post->save();
    		return redirect('admin/post/list')->with(['success' => 'Thêm bài viết thành công!..']);
    	}
    }

    // Edit post.
    public function getEditPost($id) {
    	$post = posts::findOrFail($id);
    	return view('admin.post.edit', ['post' => $post]);
    }
    
  	public function postEditPost(Request $req, $id) {
  		$rules = [
    		'name_edit' => 'required|min:10',
    		'intro_edit'=> 'required|min:100',
    		'full_edit' => 'required|min:100'
    	];
    	$mess = [
    		'name_edit.required' => 'Bạn chưa nhập tiêu đề cho bài viết',
    		'name_edit.min' => 'Tiêu đề tối thiếu phải chứa 10 ký tự',
    		'intro_edit.required'=> 'Bạn chưa viết tóm tắt cho bài viết',
    		'intro_edit.min' => 'Tóm tắt phải chứa ít nhất 100 ký tự',
    		'full_edit.required' => 'Bạn chưa nhập nội dung của bài viết',
    		'full_edit.min' => 'Nội dung của bài viết phải chứa ít nhất 100 ký tự'
    	];
    	$validator = Validator::make($req->all(), $rules, $mess);
    	if($validator->fails()) {
    		return redirect()->back()->withInput()->withErrors($validator);
    	} else {
    		$post = posts::findOrFail($id);

    		$post->title = $req['name_edit'];
    		$post->name_without_accent = str_slug($req['name_edit']);
    		$post->intro = $req['intro_edit'];
    		$post->full = $req['full_edit'];
    		$post->idUser = Auth::user()->id;
    		$post->idCate = $req['cate_edit'];
    		$post->idChuDe = $req['chude_edit'];

    		$post->save();
    		return redirect('admin/post/list')->with(['success' => 'Thêm bài viết thành công!..']);
    	}
  	}

    public function getDetailPost($id) {
        $post = posts::findOrFail($id);
        return view('pages.home.noidungbaiviet', ['post' => $post]);
    }

    public function getDeletePost($id) {
        $post = posts::findOrFail($id);
        $post->delete();
        return redirect('admin/post/list')->with(['success' => 'Xoá bài viết thành công.']);
    }
}