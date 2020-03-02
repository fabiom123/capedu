<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

    protected $table = 'personas';

    protected $fillable = ['id_persona','avatar','phone','cell','ubigeo','address','type','membership','gender','birth_date','user_id'];

    static public function get_personas(){
        return DB::table($table)
        ->get();
    }
}
