<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'subject', 
        'category',
        'grade',
        'question',
        'user_id',
        'my_comment',
        'time',
        'note_id',
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    public function choice() {
        return $this->hasMany(Choice::class);
    }

    public function getPaginateByLimit(int $limit_count = 3)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
