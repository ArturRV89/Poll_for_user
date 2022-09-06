<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $guarded = ['false'];

    public function optionsQuestion()
    {
        return $this->hasMany(OptionsQuestion::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswers::class);
    }


}
