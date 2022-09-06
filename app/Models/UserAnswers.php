<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswers extends Model
{
    use HasFactory;

    protected $table = 'user_answers';
    protected $guarded = ['false'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
