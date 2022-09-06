<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionsQuestion extends Model
{
    use HasFactory;

    protected $table = 'options_question';
    protected $guarded = ['false'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
