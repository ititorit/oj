<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table = "posts";
    public function theloai() {
    	return $this->belongsTo('App\category', 'idCate', 'id');
    }
    public function user() {
    	return $this->belongsTo('App\User', 'idUser', 'id');
    }
    public function chude() {
    	return $this->belongsTo('App\chude', 'idChuDe', 'id');
    }
}
