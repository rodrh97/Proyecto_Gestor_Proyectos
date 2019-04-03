<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    protected $table = 'programs';
    protected $fillable = ['name'];
    public static function programs($id){
        return Programs::where('id','=',$id)->get();
    }
}
