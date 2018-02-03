<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\chude;
use App\category;
use App\User;
class AjaxController extends Controller {
	public function getChuDe($idCate) {
		$chude = chude::where('idCate', $idCate)->get();
		foreach($chude as $val) {
			echo '<option value="' . $val->id .'">'. $val->name .'</option>';
		}
	}
	public function getSlug() {
		echo "Nguyen MInh Tuan";
	}
	public function checkUser(Request $req) {
		dd($req->all());
	}
}
?>