<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\posts;
use App\chude;
use App\category;
use App\User;

class HomeController extends Controller {
	public function __construct() {
		$cate = category::all();
		$chude = chude::all();
		$newPost = posts::orderBy('id', 'DESC')->limit(10)->get();
		$post = posts::orderBy('id', 'DESC')->paginate(4);

		view()->share('cate', $cate);
		view()->share('chude', $chude);
		view()->share('newPost', $newPost);
		view()->share('post', $post);
	}

	public function getHome() {
		return view('pages.home.home');
	}

	public function seach(Request $req) {
		$keywords = $req['keywords'];
		$result = posts::where('title', 'like', "%$keywords%")->orWhere('intro', 'like', "%$keywords%")->orWhere('full', 'like', "%$keywords%")->paginate(5);
		return view('pages.search.search', ['result' => $result, 'keywords' => $keywords]);
	}

	public function seachAjax(Request $req) {
		$keywords = $req['keywords'];
		$result = posts::where('title', 'like', "%$keywords%")->orWhere('intro', 'like', "%$keywords%")->orWhere('full', 'like', "%$keywords%")->paginate(5);
		return view('pages.search.searchAjax', ['result' => $result, 'keywords' => $keywords]);
	}

	public function getAbout() {
		return view('pages.about.about');
	}

	public function getListPostAjax() {
		$nameCate = category::findOrFail($idCate);
		$post = posts::orderBy('id', 'DESC')->paginate(4);
		return view('pages.home.homeAjax', ['post' => $post, 'nameCate' => $nameCate->name]);
	}

	public function getListPostByCate($idCate) {
		$nameCate = category::findOrFail($idCate);
		$postByCate = posts::orderBy('id', 'DESC')->where('idCate', $idCate)->paginate(5);
		return view('pages.home.listPostByCate', ['postByCate' => $postByCate, 'nameCate' => $nameCate->name]);
	}

	public function getListPostByCateAjax($idCate) {
		$nameCate = category::findOrFail($idCate);
		$postByCate = posts::orderBy('id', 'DESC')->where('idCate', $idCate)->paginate(5);
		return view('pages.home.listPostByCateAjax', ['postByCate' => $postByCate, 'nameCate' => $nameCate->name]);
	}

	public function getListPostByChuDe($idChuDe) {
		$nameChuDe = chude::findOrFail($idChuDe);
		$postByChuDe = posts::orderBy('id', 'DESC')->where('idChuDe', $idChuDe)->paginate(5);
		return view('pages.home.listPostByChuDe', ['postByChuDe' => $postByChuDe, 'nameChuDe' => $nameChuDe->name]);
	}

	public function getListPostByChuDeAjax($idChuDe) {
		$nameChuDe = chude::findOrFail($idChuDe);
		$postByChuDe = posts::orderBy('id', 'DESC')->where('idChuDe', $idChuDe)->paginate(5);
		return view('pages.home.listPostByChuDeAjax', ['postByChuDe' => $postByChuDe, 'nameChuDe' => $nameChuDe->name]);
	}

	public function getInfoUser($id) {
		$user = User::findOrFail($id);
		return view('pages.profiles.info', ['user' => $user]);
	}
	public function getEditPasswordUser() {
		if(Auth::check()) {
			return view('pages.profiles.changePassword');
		} else {
			return redirect('home')->with(['danger' => 'Bạn chưa đăng nhập. Vui lòng đăng nhập trước.']);
		}
	}
	public function postEditPasswordUser(Request $req) {
		$rules = [
			'oldPass' => 'required',
			'newPass' => 'required|min:8',
			're_newPass' => 'required|same:newPass'
		];
		$mess = [
			'oldPass.required' => 'Bạn chưa nhập lại mật khẩu cũ.',
			'newPass.required' => 'Bạn chưa nhập vào mật khẩu mới.',
			'newPass.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
			're_newPass.required' => 'Bạn chưa nhập lại mật khẩu.',
			're_newPass.same' => 'Mật khẩu không khớp. Vui lòng kiểm tra lại.'
		];
		$validator = Validator::make($req->all(), $rules, $mess);
		if($validator->fails()) {
			return redirect()->back()->withInput()->withErrors($validator);
		} else {
			$user = User::findOrFail(Auth::user()->id);
			if(!Hash::check($req['oldPass'], $user->password)) {
				return redirect()->back()->withInput()->with(['danger' => 'Mật khẩu cũ không đúng, vui lòng kiểm tra lại.']);
			} else {
				$user->password = bcrypt($req['newPass']);
				$user->save();
				Auth::logout();
				return redirect('home')->with(['success' => 'Đã đổi mật khẩu thành công. Vui lòng đăng nhập lại.']);
			}
		}
	}

	public function getEditInfoUser() {
		if(Auth::check()) {
			$user = User::findOrFail(Auth::user()->id);
			return view('pages.profiles.edit_info', ['user' => $user]);
		} else {
			return redirect()->back()->with(['danger' => 'Bạn chưa đăng nhập.']);
		}
	}
	public function postEditInfoUser(Request $req) {
		$rules = [
			'name_edit' => 'required',
			'address_edit' => 'required',
			'school_edit' => 'required'
		];
		$mess = [
			'name_edit.required' => 'Bạn chưa nhập vào tên. Vui lòng kiểm tra lại.',
			'address_edit.required' => 'Bạn chưa nhập vào địa chỉ. Vui lòng kiểm tra lại.',
			'school_edit.required' => 'Bạn chưa nhập vào trường. Vui lòng kiểm tra lại.',
		];
		$validator = Validator::make($req->all(), $rules, $mess);
		if($validator->fails()) {
			return redirect()->back()->withInput()->withErrors($validator);
		} else {
			$user = User::findOrFail(Auth::user()->id);

			$user->name = $req['name_edit'];
			$user->address = $req['address_edit'];
			$user->school = $req['school_edit'];

			$user->save();
			return redirect('home')->with(['success' => 'Cập nhật thông tin tài khoản của bạn thành công.']);
		}
	}
}
