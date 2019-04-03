<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Components extends Model
{
    protected $table = "sub_components";
    protected $fillable = ['name','id'];
    public static function sub_components($id){
        return Sub_Components::where('component_id','=',$id)->get();
    }
}
