<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'lastName',
        'firstName',
        'email',
        'mobile',
        'degree_id',
        'resume',
    ];

    public function degree()
    {
        return $this->hasOne(Degree::class);
    }
}
