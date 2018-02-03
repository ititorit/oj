<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chude;
use App\category;
use App\User;
use App\posts;
use Validator;

class ChuDeController extends Controller
{
	public function __construct() {

		$chude = chude::all();
		$numPost = posts::select('id')->get();
		$numUser = User::select('id')->get();
		$cate = category::all();
		$numChuDe= chude::select('id')->get();
		view()->share('cate', $cate);
		view()->share('numUser', $numUser);
		view()->share('numPost', $numPost);
		view()->share('numChuDe', $numChuDe);
		view()->share('chude', $chude);
	}
	public function getListChuDe() {
		return view('admin.chude.list');
	}


	public function getEditChuDe($id) {
		$chude = chude::findOrFail($id);
		return view('admin.chude.edit', ['chude' => $chude]);
	}

	public function postEditChuDe(Request $req, $id) {
		$rules = [
			'nameChude' => 'required'
		];
		$mess = [
			'nameChude.required' => 'Bạn chưa nhập vào tên chủ đề.'
		];
		$validator = Validator::make($req->all(), $rules, $mess);
		if($validator->fails()) {
			return redirect()->back()->withInput()->withErrors($validator);
		} else {
			$chude = chude::findOrFail($id);

			$chude->name = $req['nameChude'];
			$chude->name_without_accent = str_slug($req['nameChude'], '-');
			$chude->idCate = $req['theloai'];

			$chude->save();

			return redirect('admin/chude/list')->with(['success' => 'Thay đổi chủ đề thành công.']);
		}
	}

	public function getAddChuDe() {
		return view('admin.chude.add');
	}
	public function postAddChuDe(Request $req) {
		$rules = [
			'nameChude' => 'required'
		];
		$mess = [
			'nameChude.required' => 'Bạn chưa nhập tên của chủ đề.'
		];
		$validator = Validator::make($req->all(), $rules, $mess);
		if($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {
			$newChude = new chude;

			$newChude->name = $req['nameChude'];
			$newChude->name_without_accent = str_slug($req['nameChude'], '-');
			$newChude->idCate = $req['theloai'];

			$newChude->save();
			return redirect('admin/chude/list')->with(['success' => 'Thêm chủ đề thành công.']);
		}
	}

	public function getDeleteChuDe($id) {
		$chude = chude::findOrFail($id);
		$chude->delete();
		return redirect('admin/chude/list')->with(['success' => 'Xoá chủ đề thành công.']);
	}
}
