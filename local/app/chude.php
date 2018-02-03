<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category;
class chude extends Model
{
    protected $table = "chude";
    public function category() {
    	return $this->belongsTo('App\category', 'idCate', 'id');
    }
}
