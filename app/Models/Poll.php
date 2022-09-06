<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
    use HasFactory;
    protected $dates = ['date_start', 'date_finish'];
    protected $table = 'polls';
    protected $guarded = ['false'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
