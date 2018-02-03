<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\posts;
use Validator;
use App\category;
use App\chude;

class AdminController extends Controller
{

	public function __construct() {
		$numPost = posts::select('id')->get();
		$numUser = User::select('id')->get();
		$cate = category::all();
		$numChuDe= chude::select('id')->get();
		view()->share('cate', $cate);
		view()->share('numUser', $numUser);
		view()->share('numPost', $numPost);
		view()->share('numChuDe', $numChuDe);
	}

	public function getHomeAmin() {
		if(Auth::user()->role >= 1) {
			return view('admin.home.home');
		}
		return view('pages.home.home');
	}
    public function getListUser() {
		$user = User::paginate(10);
		return view('admin.user.list', ['user' => $user]);
	} 
	public function getListUserAjax() {
		$user = User::paginate(10);
		return view('admin.user.listAjax', ['user' => $user]);
	}
	public function getDelete($id) {
		$user = User::findOrFail($id);
		$user->delete();
		return redirect('admin/user/list')->with(['success' => 'Xóa tài khoản thành công']);
	}
	public function getSetAdmin($id) {
		$user = User::findOrFail($id);
		$user->role = 1;
		$user->save();
		return redirect('admin/user/list')->with(['success' => 'Set Admin thành công']);
	}
	public function getCancelAdmin($id) {
		$user = User::findOrFail($id);
		$user->role = 0;
		$user->save();
		return redirect('admin/user/list')->with(['success' => 'Hủy quyền Admin thành công']);
	}
	public function getEditUser($id) {
		$user = User::findOrFail($id);
		return view('admin.user.edit', ['user' => $user]);
	}
	public function postEditUser(Request $req, $id) {
		$rules = [
			'name_edit' => 'required',
			'email_edit' => 'required|email'
		];
		$mess = [
			'name_edit.required' => 'Bạn chưa nhập vào tên',
			'email_edit.required' => 'Bạn chưa nhập vào email',
			'email.email' => 'Email không đúng định dạng.'
		];

		$validator = Validator::make($req->all(), $rules, $mess);
		if($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}
		$user = User::findOrFail($id);

		$user->name = $req['name_edit'];
		$user->email= $req['email_edit'];

		$user->save();
		return redirect('admin/user/list')->with(['success' => 'Thay đổi thông tin tài khoản thành công']);
	}
}