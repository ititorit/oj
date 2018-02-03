<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
	protected $table = "category";
	public function user(){
		return $this->belongsTo('App\User', 'idUser', 'id');
	}
	public function chude() {
		return $this->hasMany('App\chude', 'idCate', 'id');
	}
}
