<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepts extends Model
{
    protected $fillable = [
        'id', 'name','specific_requirements'
    ];
    public static function concepts($id){
        return Concepts::where('sub_component_id','=',$id)->get();
    }
  
    public static function concepts_com($id){
        return Concepts::where('component_id','=',$id)->get();
    }
}
