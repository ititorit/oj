<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\chude;
use App\posts;
use App\User;
use Validator;
use Auth;

class CategoryController extends Controller
{

	public function __construct() {
		$cate = category::all();
		$numPost = posts::select('id')->get();
		$numUser = User::select('id')->get();
		$numChuDe= chude::select('id')->get();
		view()->share('cate', $cate);
		view()->share('numUser', $numUser);
		view()->share('numPost', $numPost);
		view()->share('numChuDe', $numChuDe);
	}
	public function getListCate() {
		return view('admin.category.list');
	}
	public function getAddCate() {
		return view('admin.category.add');
	}
	public function postAddCate(Request $req) {
		$rules = [
			'nameCate' => 'required'
		];
		$mess = [
			'nameCate.required' => 'Bạn chưa nhập vào tên thể loại'
		];
		$validator = Validator::make($req->all(), $rules, $mess);
		if($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$cate = new category;

			$cate->name = $req['nameCate'];
			$cate->name_without_accent = str_slug($cate->name, '-');
			$cate->idUser = Auth::user()->id;

			$cate->save();
			return redirect('admin/category/list')->with(['success' => 'Thêm thể loại thành công']);
		}
	}
	public function getDeleteCate($id) {
		$cate = category::findOrFail($id);

		$cate->delete();
		return redirect('admin/category/list')->with(['success' => 'Xóa thể loại thành công']);
	}
	public function getEditCate($id) {
		$cate = category::findOrFail($id);
		return view('admin.category.edit', ['cate' => $cate]);
	}
	public function postEditCate(Request $req, $id) {
		$cate = category::findOrFail($id);

		$cate->name = $req['nameCate'];
		$cate->name_without_accent = str_slug($req['nameCate']);
		$cate->save();
		return redirect('admin/category/list')->with(['success'=> 'Thay đổi thể loại thành công']);
	}
}