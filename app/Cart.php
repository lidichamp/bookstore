<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

protected $fillable = array('member_id','book_id','amount','total');

public function Books(){

return $this->belongsTo('App\Book','book_id');
}}
