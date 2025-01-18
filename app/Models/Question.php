<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id' , 'created_at' ,'updated_at '];

    public function exam()  {
        return $this->belongsTo(Exam::class);
    }

    public function name(){

        $lang = App::getLocale();
        return json_decode($this->name)->$lang; 
   
    }

}
