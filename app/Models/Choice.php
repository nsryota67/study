<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'choice1',
        'choice2',
        'choice3',
        'choice4',
        'correct',
        'quiz_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}
