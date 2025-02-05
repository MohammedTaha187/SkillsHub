<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cat extends Model
{
    use HasFactory;
    protected $guarded = ['id' , 'created_at' ,'updated_at '];

    protected $casts = [
        'name' => 'array',
    ];

    public function skills(){
        return $this->hasMany(Skill::class);
    }

    public function name(){

        $lang = App::getLocale(); 
        return $this->name[$lang];
   
    }
}
