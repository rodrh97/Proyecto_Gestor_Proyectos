<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepts extends Model
{
    protected $fillable = [
        'id', 'name','specific_requirements'
    ];
    public static function concepts($id){
        return Concepts::where('program_id','=',$id)->orWhere('component_id','=',$id)->orWhere('sub_component_id','=',$id)->get();
    }
}
