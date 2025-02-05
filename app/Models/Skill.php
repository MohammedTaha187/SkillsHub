<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = ['id' , 'created_at' ,'updated_at '];
    protected $skills = [
        'name' => 'array',
    ];

    public function cat(){
        return $this->belongsTo(Cat::class);
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function name()
{
    $lang = app()->getLocale();


    $name = is_array($this->name) ? $this->name : json_decode($this->name, true);

    return $name[$lang] ?? $name['en'] ?? 'اسم غير متوفر';
}


    public function getStudentCount(){
        $studentCount = 0;
        foreach($this->exams as $exam){
            $studentCount += $exam->users()->count();
        }
        return $studentCount;
    }
}
