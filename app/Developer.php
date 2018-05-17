<?php

namespace App;
use App\ProgrammingLanguage;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    public function getname(){

       return ProgrammingLanguage::where('id',$this->programming_language_id)->first()->name;

        //return $this->belongsTo('ProgrammingLanguage');
    }

    public function getlanguage(){

        return Language::where('id',$this->language_id)->first()->code;

        //return $this->belongsTo('ProgrammingLanguage');
    }

}
