<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\MessageBag;
use App\User;
use App\social;
use App\category;
use Socialite;

class LoginController extends Controller {
	public function __construct() {
		$cate = category::select('id', 'name')->get();
		view()->share('cate', $cate);
	}
	public function getLogin() {
		return view('pages.authentication.login');
	}

	public function postLogin(Request $req) {
		$user_login = $req['username_login'];
		$pass_login = $req['password_login'];
		if(Auth::attempt(['username' => $user_login, 'password' => $pass_login], $req->has('remember_login'))) {
			return response()->json([
				'error' 	=> false,
				'mess' 		=> 'success'
			], 200);
		} else {
			$errors = new MessageBag(['errorLogin' => 'Mật khẩu hoặc tài khoản không đúng']);
			return response()->json([
				'error' 	=> true,
				'mess' 		=> $errors
			], 200);
		}
	}
	public function getRegister() {
		return view('pages.register.register');
	}

	public function postRegister(Request $req) {
		$rules = [
			'username_reg' => 'min:5|unique:users,username',
			'password_reg' => 'min:8',
			're_password_reg' => 'same:password_reg',
			'email' => 'unique:users,email'
		];
		$mess = [
			'username_reg.unique' => 'Tài khoản này đã được sử dụng.',
			'username_reg.min' => 'Tài khoản phải chứa ít nhất 5 ký tự.',
			'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự.',
			're_password_reg.same' => 'Mật khẩu không khớp. Vui lòng kiếm tra lại.',
			'email.unique' => 'Email đã được sử dụng, vui lòng kiểm tra lại.'
		];

		$validator = Validator::make($req->all(), $rules, $mess);
		if($validator->fails()) {
			return redirect()->back()->withInput()->withErrors($validator);
		}

		$user = new User();

		$user->username = $req['username_reg'];
		$user->password = bcrypt($req['password_reg']);
		$user->name = $req['name_reg'];
		$user->email = $req['email_reg'];

		$user->save();
		Auth::login($user);
		return redirect('home')->with(['success' => 'Đăng ký tài khoản thành công.']);
	}

	public function getLogout() {
		Auth::logout();
		return redirect('home');
	}

	/**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $social = social::where('provider_user_id', $user->id)->where('provider', 'facebook')->first();
        if($social) {
        	$u = User::where('email', $user->email)->first();
        	Auth::login($u);
        	return redirect('home')->with(['success' => 'Đăng nhập thành công.']);
        } else {
        	$temp = new social;

        	$temp->user_id = $user->id;
        	$temp->provider_user_id = $user->id;
        	$temp->provider = 'facebook';

        	$user_now = User::where('email', $user->email)->first();
        	if(!$user_now) {
        		$user_now = new User;

        		$user_now->username = str_slug($user->name, '-');
        		$user_now->password = bcrypt('12345678');
        		$user_now->name 	= $user->name;
        		$user_now->email 	= $user->email;

        		$user_now->save();
        	}
        	$temp->save();
        	Auth::login($user_now);
        	return redirect('home')->with(['success' => 'Đăng nhập thành công.']);
        }
    }
}