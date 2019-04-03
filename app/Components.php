<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    protected $table = 'components';
   
    protected $fillable = [
        'id', 'name'
    ];
     public static function components($id){
        return Components::where('program_id','=',$id)->get();
    }
}
