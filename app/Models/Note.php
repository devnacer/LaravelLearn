<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'created_at',
    ];

    protected $fillable = [
        'title',
        'desc',
        'profile_id',
    ];

    public function profiles(){
        return $this->belongsTo(Profile::class);
    }

}
